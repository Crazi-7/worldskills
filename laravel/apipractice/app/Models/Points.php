<?php

namespace App\Models;

use App\Http\Resources\PointsResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    use HasFactory;

    protected $table = 'points';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'parent',
        'name',
    ];

    public function children() {
        return $this->hasMany(self::class, 'parent');
    }

    public static function list() 
    {
        $roots = Points::where('parent', null)->get();

        return PointsResource::collection($roots);
    }

    public function groups() 
    {
        return $this->belongsToMany(Groups::class);
    }
}

