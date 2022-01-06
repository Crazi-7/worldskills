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
        return $this->belongsToMany(Groups::class, 'group_staff', 'staff_id', 'group_id');
    }

    public function access()
    {
        return $this->hasMany(Access::class, 'staff_id');
    }

    public function logs()
    {
        return $this->hasMany(Logs::class, 'staff_id');
    }
}
