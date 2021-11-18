<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livrison extends Model
{
    //
    protected $fillable = [
        'user_id','fournisseur_id',
    ];
    public function produits(){

            return $this->belongsToMany(Produit::class)->withTimestamps();;

    }
}
