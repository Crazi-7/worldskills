<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    use HasFactory;
    protected $table = 'order-product';
    protected $fillable = ['oid', 'pid', 'qtt'];
    public $timestamps = false;
}
