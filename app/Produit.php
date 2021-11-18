<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $fillable = [
        'name','desc','qte','min_qte','prix','image','list_de_vend','catagorie_id',
    ];
    public function catagory(){
        return $this->belongsTo(Catagory::class,'catagorie_id');
    }
    public function images(){
        return $this->hasMany(Image::class,'produit_id');
    }
    public function livrisons(){
        return $this->belongsToMany(Livrison::class)->withTimestamps();;
    }
}
