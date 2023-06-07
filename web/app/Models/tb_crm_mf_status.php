<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_crm_mf_status extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_crm_mf_status';

    protected $fillable = [
        'code',
        'name',
        'is_for_posting',
        'is_cancelled',
        'is_posted',
        'is_active'
    ];

    public $sortable = ['id', 'code', 'name', 'is_active'];
}
