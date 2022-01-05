<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'full_name',
        'photo',
        'code',
    ];

    public function groups() 
    {
        return $this->belongsToMany(Groups::class);
    }

    public function access()
    {
        return $this->hasMany(StaffAccess::class, 'staff_id');
    }
}
