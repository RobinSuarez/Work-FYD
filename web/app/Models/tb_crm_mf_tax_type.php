<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_crm_mf_tax_type extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_crm_mf_tax_type';

    protected $fillable = [
        'code',
        'name',
        'is_active'
    ];

    public $sortable = ['id', 'code', 'name', 'is_active'];

}
