<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_ar_tr_or_app extends Model
{
    use HasFactory; 

    protected $table = 'tb_ar_tr_or_app';

    protected $fillable = [
        'or_id',
        'lr_ar_cust_id',
        'amount_applied',
    ];
}
