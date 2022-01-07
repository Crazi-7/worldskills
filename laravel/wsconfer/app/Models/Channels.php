<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    use HasFactory;
    protected $table = 'channels';
    protected $primaryLey = 'id';
    protected $fillable = [
        'event_id',
        'name',
        
    ];
    public $timestamps = false;

    public function rooms() {
        return $this->hasMany(Rooms::class, 'channel_id');
    }
}
