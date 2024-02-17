<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'currency',
        'price',
        'description',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
