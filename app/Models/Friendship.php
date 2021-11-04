<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Friendship extends Model
{
    use HasFactory;

    protected $fillable = [
        'accepted_at'
    ];

    public function requester() {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function addressee() {
        return $this->belongsTo(User::class, 'addressee_id');
    }
}
