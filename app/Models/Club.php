<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'affiliation_id',
        'user_id',
        'address',
        'logo',
        'trading_as',
        'registration_number',
        'vat_number',
        'ncr_number',
        'helpline',
        'website',
        'number_of_players',
        'type',
    ];
}
