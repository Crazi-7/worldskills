<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    protected $table = 'Logs';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    const UPDATED_AT = null;

    protected $fillable = [
        'staff_id',
        'point_id',
        'camera',
        'access',
    ];
    
    // protected $dateFormat = 'U';

    public function points() 
    {
        return $this->belongsTo(Points::class, "point_id");
    }

    public function staff() 
    {
        return $this->belongsTo(Staff::class);
    }

    public function getCreatedAtAttribute($created_at)
    {        
        return Carbon::parse($created_at)->timestamp;
    }
    
}
