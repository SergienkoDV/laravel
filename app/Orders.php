<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Positions;

class Orders extends Model
{
    protected $fillable = [
        'address'];
    public $timestamps = false;

    public function positions()
    {
        return $this->hasMany('App\Positions');
    }
    public function products()
    {
        return $this->hasMany('App\Products');
    }
}
