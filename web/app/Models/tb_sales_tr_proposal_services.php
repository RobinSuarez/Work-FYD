<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_sales_tr_proposal_services extends Model
{
    use HasFactory;

    protected $table = 'tb_sales_tr_proposal_services';

    protected $fillable = [
        'proposal_id',
        'service_id',
        'qty',
        'uom_id',
        'price',
        'with_vat',
        'seq',
        'total',
    ];
}
 