<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryLey = 'id';
    protected $fillable = [
        'organizer_id',
        'name',
        'slug',
    ];
    public $timestamps = false;

    public function registrations() {
        return $this->hasManyThrough(Registrations::class, Tickets::class, 'event_id', 'ticket_id');
    }

    public function tickets() {
        return $this->hasMany(Tickets::class, 'event_id');
    }

    public function channels() {
        return $this->hasMany(Channels::class, 'event_id');
    }

    public function rooms() {
        return $this->hasManyThrough(Rooms::class, Channels::class, 'event_id', 'channel_id');
    }

    public function organizers() {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }

    public function date() {
        return Carbon::parse($this->date)->format('F d, Y');
    }
}
