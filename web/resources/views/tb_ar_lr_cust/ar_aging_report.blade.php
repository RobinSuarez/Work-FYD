@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header">
            FILTERS
        </div>
        <div class="card-body">
            <form method="GET" action="{{route('ar-lr-cust.aging-report')}}" >
                @csrf
                <div class="form d-inline mb-3">
                    @datefield([
                        'name'        => 'asof_date',
                        'value'       => old('asof_date') ?? $def_date,
                        'col'         => 'col-lg-4 col-md-6 col-sm-12 px-0',
                        'label_class' => ''
                    ])@enddatefield
                    <button type="submit" class="btn btn-sm btn-secondary form-btn mt-3"><i class="far fa-search" style="font-weight: 900"></i> Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mt-3 mb-3">
        <div class="card-header">
            {{-- <a href="{{ route('ors.index') }}">AR AGING REPORT</a> --}}
            AR AGING REPORT
        </div>
        <div class ="card-body">
            <table class="table table-sm table-striped">
                <thead class="table-light-blue">
                    <tr>
                        <td>NO.</td>
                        <td>CLIENT</td>
                        <td>T. ID</td>
                        <td>T. NO</td>
                        <td>T. DATE</td>
                        <td>T. CODE</td>
                        <td>REMARKS</td>
                        <td>TODAY</td>
                        <td>AMOUNT 01-30</td>
                        <td>AMOUNT 31-60</td>
                        <td>AMOUNT 61-90</td>
                        <td>AMOUNT 91-120</td>
                        <td>AMOUNT GE 121</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->client_name }}</td>
                            <td>{{ sprintf('%08d', $d->trans_id) }}</td>
                            <td>{{ $d->trans_no }}</td>
                            <td>{{ $d->trans_date }}</td>
                            <td>{{ $d->trans_code }}</td>
                            <td>{{ $d->remarks }}</td>
                            <td>{{ number_format($d->today, 2) }}</td>
                            <td>{{ number_format($d->amount_01_30, 2) }}</td>
                            <td>{{ number_format($d->amount_31_60, 2) }}</td>
                            <td>{{ number_format($d->amount_61_90, 2) }}</td>
                            <td>{{ number_format($d->amount_91_120, 2) }}</td>
                            <td>{{ number_format($d->amount_ge_121, 2) }}</td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection