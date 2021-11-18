<?php

namespace App\Http\Controllers\admin;

use App\DataTables\FournisseurDatatable;
use App\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FournisseurController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read-fournisseurs'])->only('index');
        $this->middleware(['permission:update-fournisseurs'])->only('edit');
        $this->middleware(['permission:delete-fournisseurs'])->only('destroy');
        $this->middleware(['permission:create-fournisseurs'])->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title='fournisseurs';
    public function index(FournisseurDatatable $fournisseur)
    {
        //
        return $fournisseur->render('admin.fournisseurs.index',['title'=> $this->title,'fournisseur'=>$fournisseur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.fournisseurs.create',['title'=>$this->title]);
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
            'phone'    => 'required|unique:fournisseurs',
            'address'    => 'required',
        ]);




        $data = $request->all();


        Session()->flash('message',trans('site.fournisseur_add_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.fournisseur_add_success'));
        $fournisseur = Fournisseur::create($data);




        return redirect()->route('admin.fournisseurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fournisseur $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        //

        return view('admin.fournisseurs.edit',compact('fournisseur'))->with('title',$this->title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //

        $request->validate([
            'name' => 'required|min:3|max:25',
            'phone' => 'required|unique:fournisseurs,phone,'.$fournisseur->phone.',phone',
            'address' => 'required',


        ]);








        $data = $request->all();


        Session()->flash('message',trans('site.fournisseur_edit_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.fournisseur_add_success'));
        $fournisseur->update($data);




        return redirect()->route('admin.fournisseurs.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
        dd('hello delete');
    }
    //
}
