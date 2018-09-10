<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Couleur extends Model
{
    protected $fillable = [
        'nom'
    ];

    public function products() {
        return $this->belongsToMany('App\Product');
    }
}
