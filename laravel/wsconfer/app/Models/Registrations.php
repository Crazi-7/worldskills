<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    use HasFactory;
    protected $table = 'registrations';
    protected $primaryLey = 'id';
    protected $fillable = [
        'attendee_id',
        'ticket_id',
        'registration_time',
    ];
    public $timestamps = true;
}
