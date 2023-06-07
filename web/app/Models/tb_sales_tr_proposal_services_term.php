<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_sales_tr_proposal_services_term extends Model
{
    use HasFactory; 

    protected $table = 'tb_sales_tr_proposal_services_term';

    protected $fillable = [
        'proposal_services_id',
        'due_date',
        'amount',
    ];
}
