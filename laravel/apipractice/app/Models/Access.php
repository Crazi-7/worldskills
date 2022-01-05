<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;
    protected $table = 'staff_accesses';
    
    public $timestamps = false;
    protected $fillable = [
        'staff_id',
        'point_id',
        'time',
    ];
}
