<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_crm_mf_company extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_crm_mf_company';

    protected $fillable = [
        'code',
        'name',
        'is_active',
    ];

    public $sortable = ['id', 'code', 'name', 'is_active'];
}
