<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['pickup', 'cid', 'value', 'home', 'address'];
    
    public function products() {
        return $this->belongsToMany(Product::class, 'order-product', 'oid', 'pid');
    }

    public function customers() {
        return $this->belongsTo(Customer::class, 'cid');
    }
}
