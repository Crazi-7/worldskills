<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    use HasFactory;
    protected $table = 'sessions';
    protected $primaryLey = 'id';
    protected $fillable = [
        'room_id',
        'title',
        'description',
        'speaker',
        'start',
        'type',
        'cost',
    ];
    public $timestamps = false;

    public function room() {
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function session_registrations() {
        return $this->hasMany(Session_registrations::class, 'session_id', 'id');
    }

    public function start() {
        return Carbon::parse($this->start)->format('H:i');
    }

    public function end() {
        return Carbon::parse($this->end)->format('H:i');
    }
  
}
