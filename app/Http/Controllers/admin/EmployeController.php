<?php

namespace App\Http\Controllers\admin;
use App\DataTables\EmployeDatatable;
use App\Employe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class EmployeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read-employes'])->only('index');
        $this->middleware(['permission:update-employes'])->only('edit');
        $this->middleware(['permission:delete-employes'])->only('destroy');
        $this->middleware(['permission:create-employes'])->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title='employes';
    public function index(EmployeDatatable $employe)
    {
        //
        return $employe->render('admin.employes.index',['title'=> $this->title,'employe'=>$employe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.employes.create',['title'=>$this->title]);
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
            'phone'    => 'required|unique:employes',
            'cin'    => 'required|unique:employes',
            'address'    => 'required',
            'gard'    => 'required',
            'sold'    => 'required',
        ]);




        $data = $request->all();


        Session()->flash('message',trans('site.employe_add_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.employe_add_success'));
        $employe = Employe::create($data);




        return redirect()->route('admin.employes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employe $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        //
        return view('admin.employes.edit',compact('employe'))->with('title',$this->title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        //

        $request->validate([
            'name' => 'required|min:3|max:25',
            'phone' => 'required|unique:employes,phone,'.$employe->phone.',phone',
            'cin' => 'required|unique:employes,cin,'.$employe->cin.',cin',
            'address' => 'required',
            'gard' => 'required',
            'sold' => 'required',


        ]);








        $data = $request->all();


        Session()->flash('message',trans('site.employe_edit_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.employe_add_success'));
        $employe->update($data);




        return redirect()->route('admin.employes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        //
        dd('hello delete');
    }
}
