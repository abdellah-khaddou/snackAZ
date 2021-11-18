<?php

namespace App\Http\Controllers\admin;
use App\Catagory;
use App\DataTables\ProduitDatatable;
use App\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;


class ProduitController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read-produits'])->only('index');
        $this->middleware(['permission:update-produits'])->only('edit');
        $this->middleware(['permission:delete-produits'])->only('destroy');
        $this->middleware(['permission:create-produits'])->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title='produits';
    public function index(ProduitDatatable $produit)
    {
        //



        return $produit->render('admin.produits.index',['title'=> $this->title,'produit'=>$produit]);
    }
    public function showProduitCat($catid){

        $produit = new ProduitDatatable();

        return $produit->with('catid',$catid)->render('admin.produits.index',['title'=> $this->title,'produit'=>$produit]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($val=null)
    {
        //
        $catagories = Catagory::all();

        return view('admin.produits.create',['title'=>$this->title,'catagories'=>$catagories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'name'     => 'required|min:3|max:25',
            'desc'    => 'required',
            'qte'    => 'required',
            'min_qte'    => 'required',
            'prix_vend'    => 'required',
            'image'    => 'mimes:jpeg,jpg,png,gif',
            'catagorie_id'    => 'required',
            'list_de_vend'    => 'required',
        ]);
       $data = $request->except('prix_vend');
        $data['image'] =  $name= ImageController::storeImage( $request,$request->name,$request->catagorie_id,'produits','image','produits');
        if($data['image']==null){
            $data['image'] ='default.png';
        }
        $data['prix'] = $request->prix_vend;
        Session()->flash('message',trans('site.produit_add_success'));
        Session()->flash('alert-class', 'alert-success success');

        //session()->flash('success',trans('site.produit_add_success'));
        $produit = Produit::create($data);




        return redirect()->route('admin.produits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\produit $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
        $catagories = Catagory::all();

        $old_cat = $produit->catagory;
        return view('admin.produits.edit',compact('produit','catagories','old_cat'))->with('title',$this->title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //

        $request->validate([
            'name'     => 'required|min:3|max:25',
            'desc'    => 'required',
            'qte'    => 'required',
            'min_qte'    => 'required',
            'prix'    => 'required',
            'catagorie_id'    => 'required',
            'list_de_vend'    => 'required',

        ]);
        $data = $request->all();
        $data['image'] =  $name= ImageController::storeImage( $request,$request->name,$request->catagorie_id,'produits','image','produits');


        Session()->flash('message',trans('site.produit_edit_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.produit_add_success'));
        $produit->update($data);




        return redirect()->route('admin.produits.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
        dd('hello delete');
    }
}
