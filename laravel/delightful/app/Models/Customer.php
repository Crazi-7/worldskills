<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'password'];
    public $timestamps = false;

    public function customers() {
        return $this->hasMany(Customer::class, 'cid', 'id');
    }
}

