<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    //
    protected $fillable = [
        'name','phone','address',
    ];
    public function users(){
        return $this->belongsToMany(User::class,'livrisons','fournisseur_id','users_id');
    }
}
