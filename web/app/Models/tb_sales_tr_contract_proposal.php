<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class tb_sales_tr_contract_proposal extends Model
{
    use HasFactory, Sortable;

    protected $table = 'tb_sales_tr_contract_proposal';

    protected $fillable = [
        'contract_id',
        'proposal_id',
        'seq',
    ];

    public $sortable = [ 
        'id',
        'contract_id',
        'proposal_id',
        'seq',
    ];

    // public $sortableAs = ['proposal'];
}
