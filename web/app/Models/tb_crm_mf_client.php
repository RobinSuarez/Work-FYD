<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_crm_mf_client extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_crm_mf_client';

    protected $fillable = [
        'code',
        'name',
        'address',
        'area_id',
        'is_active'
    ];

    public $sortable = ['id', 'code', 'name', 'address', 'area_id', 'is_active'];
}
