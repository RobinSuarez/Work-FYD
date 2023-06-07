<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class tb_sales_tr_proposal extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_sales_tr_proposal';

    protected $fillable = [
        'date',
        'no',
        'client_id',
        'salesman_id',
        'company_id',
        'version_id',
        'amount',
        'tax_type_id',
        'status_id',
        'remarks'
    ];

    public $sortable = [ 
        'id',
        'date',
        'no',
        'client_id',
        'salesman_id',
        'version_id',
        'amount',
        'tax_type_id',
        'status_id',
        'remarks'
    ];

    public $sortableAs = ['client', 'salesman', 'company', 'tax_type', 'status'];
}
