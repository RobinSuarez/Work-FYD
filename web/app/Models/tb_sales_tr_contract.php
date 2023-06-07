<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_sales_tr_contract extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_sales_tr_contract';

    protected $fillable = [
        'date',
        'no',
        'status_id',
        'remarks'
    ];

    public $sortable = [ 
        'id',
        'date',
        'no',
        'status_id',
        'remarks'
    ];

    public $sortableAs = ['status'];

}
