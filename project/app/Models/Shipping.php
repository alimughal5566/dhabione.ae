<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['user_id', 'title', 'subtitle', 'price'];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

}