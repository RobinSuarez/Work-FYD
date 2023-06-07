<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_ar_tr_or_pay_cash extends Model
{
    use HasFactory;

    protected $table = 'tb_ar_tr_or_pay_cash';

    protected $fillable = [
        'or_id',
        'amount',
        'ref_no',
        'ref_date',
        'remarks' 
    ];
}
