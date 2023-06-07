<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_ar_tr_soa_app extends Model
{
    use HasFactory;

    protected $table = 'tb_ar_tr_soa_app';

    protected $fillable = [
        'soa_id',
        'ar_lr_cust_id',
    ];
}
