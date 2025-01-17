<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'name',
        'bankName',
        'cardNumber',
        'clientDni',
        'clientName',
        'clientLastName',
        'availableLimit',
    ];
}
