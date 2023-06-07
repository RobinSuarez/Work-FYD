<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_crm_mf_service extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_crm_mf_service';

    protected $fillable = [
        'code',
        'name',
        'uom_id',
        'price',
        'is_active'
    ];

    public $sortable = ['id', 'code', 'name', 'uom_id','price','is_active'];

    public $sortableAs = ['uom'];
}
