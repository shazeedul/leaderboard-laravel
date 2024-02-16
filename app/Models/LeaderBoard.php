<?php

namespace App\Models;

use App\Models\Club;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaderBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_time',
        'close_time',
        'status',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'close_time' => 'datetime',
    ];

    // clubs
    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'leader_board_entries');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'open');
    }
}
