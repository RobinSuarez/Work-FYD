<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_ar_tr_or extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_ar_tr_or';

    protected $fillable = [
        'no',
        'date',
        'client_id',
        'total_cash_amount',
        'total_check_amount',
        'total_applied',
        'remarks',
        'status_id'
    ];

    public $sortable = [ 
        'id',
        'no',
        'date',
        'client_id',
        'total_cash_amount',
        'total_check_amount',
        'total_applied',
        'remarks',
        'status_id'
    ];

    public $sortableAs = ['status', 'clients'];
}
