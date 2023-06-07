@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{route('ors.edit', ['or' => $or_id])}}">OR APP</a> | Searcher
        </div>
        <div class="card-body">
            <div class="row mb-4">
                @text([
                        'name'      => 'id',
                        'value'     => $or->id,
                        'disabled'  => 1,
                ])@endtext

                @text([
                    'name' => 'no',
                    'value' => old('no') ?? $or->no,
                    'placeholder' => 'Enter the NO',
                    'disabled' => 1,
                ])@endtext

                @datefield([
                    'name'  => 'date',
                    'value' => old('date') ?? $or->date,
                    'disabled' => 1,
                ])@enddatefield

                @text([
                    'name'          => 'total_pay_amount',
                    'value'         => old('total_pay_amount')?? number_format($or->total_pay_amount, 2),
                    'placeholder'   => 'Enter the total_check_amount',
                    'disabled'      => 1
                ])@endtext

                @text([
                    'name'          => 'total_applied',
                    'value'         => old('total_applied')?? number_format($or->total_applied, 2),
                    'placeholder'   => 'Enter the total_applied',
                    'disabled'      => 1
                ])@endtext

                @text([
                    'name'          => 'total_excess',
                    'value'         => old('total_excess')?? number_format($or->total_excess, 2),
                    'placeholder'   => 'Enter the total_excess',
                    'disabled'      => 1
                ])@endtext

            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            Searcher List
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('or-apps.merge')}}" enctype="multipart/form-data">
            @csrf
            <table class="table table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>TRANS ID</td>
                        <td>TRANS NO</td>
                        <td>TRANS DATE</td>
                        <td>TRANS REMARKS</td>
                        <td>AMOUNT</td>
                        <td>BALANCE</td>
                        <td>IS APPLIED</td>
                        <td>AMOUNT APPLIED</td>
                        <td>REMARKS</td>
                    </tr>
                </thead>
                <tbody id="tb_search">
                    <input type="hidden" name="or_id" class="form-control" value="{{ $or->id }}" >
                    @forelse ($or_apps as $or_app)
                    <tr>
                        <td>
                            {{ $loop->iteration }} 
                            <input type="hidden" name="id[]" class="form-control" value="{{ $or_app->id }}" > 
                            {{-- <input type="hidden" name="or_id" class="form-control" value="{{ $or_app->or_id }}" > --}}
                            <input type="hidden" name="ar_lr_cust_id[]" class="form-control" value="{{ $or_app->ar_lr_cust_id }}" >
                        </td>
                        <td>{{ sprintf('%08d', $or_app->trans_id) }}  </td>
                        <td>{{ $or_app->trans_no }}  </td>
                        <td><input type="date" class="form-control" style="background-color: #e9ecef;" name="trans_date[]" value="{{ $or_app->trans_date }}" readonly></td>
                        <td><textarea class="form-control" name="trans_remarks[]" style="background-color: #e9ecef;" rows="1" readonly>{{ $or_app->trans_remarks }}</textarea></td>
                        <td><input name="amount[]" class="form-control amount" value="{{ number_format($or_app->amount, 2)  }}" disabled></td>
                        <td><input name="balance[]" class="form-control balance" value="{{ number_format($or_app->balance, 2)  }}" disabled></td>
                        {{-- IS APPLIED --}}
                        @if($disabled == "0")
                            <input type="hidden" name="is_applied[]" value="0"/>
                            <td><input class="form-check-input is_applied" type="checkbox" value="1" name="is_applied[]"  {{ ($or_app->is_applied??0) == 1 ? "checked":""}}></td>
                        @else
                            <input type="hidden" name="is_applied[]" value="0"/>
                            <td><input class="form-check-input is_applied" type="checkbox" value="1" name="is_applied[]"  {{ ($or_app->is_applied??0) == 1 ? "checked":""}} disabled></td>
                        @endif
                        {{-- AMOUNT APPLIED --}}
                        <td><input name="amount_applied[]" class="form-control amount_applied" style="background-color: #e9ecef;" value="{{ number_format($or_app->amount_applied, 2)  }}" readonly></td>
                        {{-- REMARKS --}}
                        @if($disabled == "0")
                            <td><textarea class="form-control" name="remarks[]" rows="1" placeholder="Enter the REMARKS">{{ $or_app->remarks }}</textarea></td>
                        @else
                            <td><textarea class="form-control" name="remarks[]" rows="1" placeholder="Enter the REMARKS" readonly>{{ $or_app->remarks }}</textarea></td>
                        @endif
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
                <button type="submit" class="btn btn-secondary">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection 

@section('scripts')
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

        $(document).on('change', '.is_applied', function() {
            var $old_excess = parseFloat($("#total_excess").val().replace(/(\d+),(?=\d{3}(\D|$))/g, "$1"));
            var $tr = $(this).parents("tr");
            var $bal = parseFloat($tr.find("td .balance").val().replace(/(\d+),(?=\d{3}(\D|$))/g, "$1"));
            
            var $amount_applied = 0;
            var $new_excess = 0;
            var $new_bal = 0;
            var $new_total_applied = 0;

            var $old_amount_applied = parseFloat($tr.find("td .amount_applied").val().replace(/(\d+),(?=\d{3}(\D|$))/g, "$1"));
            var $total_applied = parseFloat($("#total_applied").val().replace(/(\d+),(?=\d{3}(\D|$))/g, "$1"));
            var $total_excess = parseFloat($("#total_excess").val().replace(/(\d+),(?=\d{3}(\D|$))/g, "$1"));
            if(this.checked){
                //alert(parseFloat($bal) >= parseFloat($bal));
                if($old_excess >= $bal && $old_excess != 0) {
                    //SET ROW
                    $amount_applied = $bal;
                    $new_bal = $bal - $amount_applied;
                    //SET HEADER
                    $new_excess = $old_excess - $bal;
                    $new_total_applied = $total_applied + $amount_applied
                } else if ($old_excess < $bal && $old_excess != 0) {
                    //SET ROW
                    $amount_applied = $old_excess;
                    $new_bal = $bal - $amount_applied;
                    //SET HEADER
                    $new_excess = $old_excess - $old_excess;
                    $new_total_applied = $total_applied + $amount_applied
                } else {
                    //DO NOTHING
                    //alert('Here');
                    return;
                }
            } else {
                if($old_amount_applied != 0) {
                //SET ROW
                $amount_applied = 0;
                //SET HEADER
                $new_excess = $old_excess + $old_amount_applied;
                $new_total_applied = $total_applied - $old_amount_applied
                } else {
                $new_total_applied = $total_applied;
                }
                
            $new_bal = $bal + $old_amount_applied;
            }
            
            $tr.find("td .amount_applied").val(formatNum($amount_applied));
            $tr.find("td .balance").val(formatNum($new_bal));
            $("#total_excess").val(formatNum($new_excess));
            $("#total_applied").val(formatNum($new_total_applied));
        });


        function formatNum(num) {
            var num_parts = num.toString().split(".");
            num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return num_parts.join(".");
        }

</script>
@endsection