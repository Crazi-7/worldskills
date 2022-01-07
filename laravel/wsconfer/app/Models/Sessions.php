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


    
    public function getStartAttribute($date)
    {
        return Carbon::parse($date)->format('H:i');
    }

    public function getEndAttribute($date)
    {
        return Carbon::parse($date)->format('H:i');
    }
}
