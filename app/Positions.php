<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Positions extends Model
{
    protected $fillable = [
        'total',
        'products_id',
        'orders_id'
    ];
    public $timestamps = false;
    public function orders()
    {
        return $this->belongsTo('App\positions', 'orders_id', 'id');
    }
    public function products()
    {
        return $this->belongsTo('App\Product', 'products_id', 'id');
    }
}
