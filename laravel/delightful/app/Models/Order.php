<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['pickup', 'cid', 'value', 'home', 'address','date'];
    protected $casts = [
        'date' => 'date:d/m/Y'
    ];
    
    public function products() {
        return $this->belongsToMany(Product::class, 'order-product', 'oid', 'pid');
    }

    public function user() {
        return $this->belongsTo(User::class, 'cid');
    }

    // Acessor
    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y H:i:s');
    }
}
