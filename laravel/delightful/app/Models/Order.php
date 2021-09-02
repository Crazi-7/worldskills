<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    
    protected $fillable = ['date', 'cid', 'value', 'home', 'address'];
    
    public function products() {
        return $this->belongsToMany(Product::class, 'order-product', 'oid', 'pid');
    }
}