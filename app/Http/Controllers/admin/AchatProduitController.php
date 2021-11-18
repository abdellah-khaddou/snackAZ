<?php

namespace App\Http\Controllers\admin;

use App\Cart;
use App\Catagory;
use App\Fournisseur;
use App\Produit;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

class AchatProduitController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['permission:read-achat'])->only('index');
        $this->middleware(['permission:update-achat'])->only('edit');
        $this->middleware(['permission:delete-achat'])->only('destroy');
        $this->middleware(['permission:create-achat'])->only('create');
    }
    public $title = 'achat';

    public function index(){
        $produits = Produit::all();
        return $this->getcart($produits);

    }
    public function addAchat(Request $request,$id){


        $product = Produit::find($id);
        $newprice = $request->prix;
        $newqte = $request->qte;
        $oldcart = Session::has('cart') ?  Session::get('cart'): null;
        $cart = new Cart($oldcart);
        $cart->add($product,$product->id,$newprice,$newqte);
        $request->session()->put('cart',$cart);

        return response()->json(['totalqte' => session()->get('cart')->totalQty], 200);
    }
    public function deleteAchat(Request $request,$id){


        $product = Produit::find($id);

        $oldcart = Session::has('cart') ?  Session::get('cart'): null;
        $cart = new Cart($oldcart);
        $cart->delete($product,$product->id);
        if(Session::has('cart')){
            $request->session()->put('cart',$cart);
            return response()->json(['totalqte' => session()->get('cart')->totalQty], 200);
        }
        return response()->json(['totalqte' => 0], 200);


    }
    public function changeAchat(Request $request,$id){


        $product = Produit::find($id);
        $newqte = $request->qte;
        $oldcart = Session::has('cart') ?  Session::get('cart'): null;
        $cart = new Cart($oldcart);
        $cart->change($product,$product->id,$newqte);
        $request->session()->put('cart',$cart);

        return response()->json(['totalqte' => session()->get('cart')->totalQty,'qtee'=>$newqte], 200);
    }



    public function getcart($produits){
        $fournisseurs = Fournisseur::all();
        $catagories = Catagory::all();
        if(!session()->has('cart')){
            return view('admin.achat.index',['title'=> $this->title,'produits'=>$produits,'catagories'=>$catagories]);
        }
        $oldcart = session()->get('cart');
        $cart = new Cart($oldcart);

        return view('admin.achat.index',['produitsCart'=> $cart->items,'totalprice'=>$cart->totalPrice ,'catagories'=>$catagories,'title'=> $this->title,'produits'=>$produits,'fournisseurs'=>$fournisseurs]);

    }
}
