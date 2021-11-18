<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public static function storeImage(Request $request,$nomChamp =null,$idChamp,$place,$nameImage ){

        if ($request->hasFile($nameImage)) {
            $image = $request->file($nameImage);
            $name  = $nomChamp.$idChamp.date("m.d.y").'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/'.$place);
            $image->move($destinationPath, $name);
            return $name;

        }

    }

    public static function updateImage(Request $request,$nomChamp =null,$idChamp,$place,$nameImage,$table){

        if ($request->hasFile($nameImage)) {
            $request->validate([
                $nameImage => 'mimes:jpeg,jpg,png,gif',
            ]);

            $image = $request->file($nameImage);
            self::deleteImage($place,$table);
            $name = $nomChamp.$idChamp . date("m.d.y") . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/' . $place);
            $image->move($destinationPath, $name);
            return $name;
            }
        return null;

        }


        public static function deleteImage($place,$table){
            Storage::move('public/'.$place.'/'.$table->image,'delete'.'public/'.$table.'/'.$table->image);
        }

}
