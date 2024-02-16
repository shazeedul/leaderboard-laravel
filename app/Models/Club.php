<?php

namespace App\Models;

use App\Models\User;
use App\Models\Affiliation;
use App\Models\LeaderBoardEntry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // leader board
    public function leaderBoards()
    {
        return $this->belongsToMany(LeaderBoard::class, 'leader_board_entries');
    }

    public function affiliation()
    {
        return $this->belongsTo(Affiliation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
