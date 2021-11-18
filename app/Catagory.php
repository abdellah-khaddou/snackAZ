<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    //
    protected $fillable = [
        'name'
    ];
    public function produits() {
       return $this->hasMany(Produit::class,'catagorie_id');
    }
}
