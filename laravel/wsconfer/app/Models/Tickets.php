<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $table = 'event_tickets';
    protected $primaryLey = 'id';
    protected $fillable = [
        'event_id',
        'name',
        'cost',
        'special_validity'
    ];
    public $timestamps = false;

  
}
