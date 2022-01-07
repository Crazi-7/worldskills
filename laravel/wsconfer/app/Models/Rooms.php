<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $primaryLey = 'id';
    protected $fillable = [
        'channel_id',
        'name',
        'capacity',
    ];
    public $timestamps = false;

    public function sessions() {
        return $this->hasMany(Sessions::class, 'room_id');
    }

    public function channel() {
        return $this->belongsTo(Channels::class, 'channel_id');
    }
}
