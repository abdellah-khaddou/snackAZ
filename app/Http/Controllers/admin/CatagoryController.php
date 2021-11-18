<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CatagoryDatatable;
use App\Catagory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatagoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read-catagories'])->only('index');
        $this->middleware(['permission:update-catagories'])->only('edit');
        $this->middleware(['permission:delete-catagories'])->only('destroy');
        $this->middleware(['permission:create-catagories'])->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title='catagories';
    public function index(CatagoryDatatable $catagory)
    {
        //
        return $catagory->render('admin.catagories.index',['title'=> $this->title,'catagory'=>$catagory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.catagories.create',['title'=>$this->title]);
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

        ]);




        $data = $request->all();


        Session()->flash('message',trans('site.catagorie_add_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.catagorie_add_success'));
        $catagorie = Catagory::create($data);




        return redirect()->route('admin.catagories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\catagorie  $catagorie
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
            return redirect(url('admin/produits/produitcat/'.$catagory->id));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\catagorie $catagorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        //

        return view('admin.catagories.edit',compact('catagory'))->with('title',$this->title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\catagorie  $catagorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        //

        $request->validate([
            'name' => 'required|min:3|max:25',

        ]);








        $data = $request->all();


        Session()->flash('message',trans('site.catagorie_edit_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.catagorie_add_success'));
        $catagory->update($data);




        return redirect()->route('admin.catagories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\catagorie  $catagorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        //
        dd('hello delete');
    }
    //
}
