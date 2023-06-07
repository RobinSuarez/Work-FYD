<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_ar_tr_or_pay_check extends Model
{
    use HasFactory;

    protected $table = 'tb_ar_tr_or_pay_check';

    protected $fillable = [
        'or_id',
        'check_no',
        'check_date',
        'bank_id',
        'amount',
        'remarks' 
    ];
}
