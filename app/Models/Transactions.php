<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'payment_id',
        'discount_id',
        'total',
        'cash',
        'change'
    ];
}
