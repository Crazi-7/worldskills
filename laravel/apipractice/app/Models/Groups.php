<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;

    protected $table = 'groups';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];


    public function points() 
    {
        return $this->belongsToMany(Points::class, 'group_points', 'group_id', 'point_id');
    }

    public function staff() 
    {
        return $this->belongsToMany(Staff::class, 'group_staff', 'group_id', 'staff_id');
    }
}
