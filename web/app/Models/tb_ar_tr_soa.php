<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_ar_tr_soa extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_ar_tr_soa';

    protected $fillable = [
        'date',
        'no',
        'client_id',
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