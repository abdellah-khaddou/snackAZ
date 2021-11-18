<?php

namespace App\Http\Controllers\admin;
use App\DataTables\ClientDatatable;
use App\Client;
use Illuminate\Contracts\Filesystem\FileExistsException;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read-clients'])->only('index');
        $this->middleware(['permission:update-clients'])->only('edit');
        $this->middleware(['permission:delete-clients'])->only('destroy');
        $this->middleware(['permission:create-clients'])->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title='clients';
    public function index(ClientDatatable $client)
    {
        //
        return $client->render('admin.clients.index',['title'=> $this->title,'client'=>$client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.clients.create',['title'=>$this->title]);
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
            'username' => 'required|unique:clients|min:4|max:14',
            'email'    => 'required|unique:clients|email',
            'phone'    => 'required|unique:clients',
            'cin'    => 'required|unique:clients',
            'address'    => 'required',
            'password' => 'required|min:8|confirmed',
            'image'    => 'mimes:jpeg,jpg,png,gif',
        ]);




        $data = $request->except(['password','image','password_confirmation']);

            $name= ImageController::storeImage( $request,$request->username,$request->id,'clients','image');
            if($name ==null){
                $name='avatar.png';
            }


            $data['image'] = $name;

        $data['password']= bcrypt($request->password);


        Session()->flash('message',trans('site.client_add_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.client_add_success'));
        $client = Client::create($data);




        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //

        return view('admin.clients.edit',compact('client'))->with('title',$this->title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //

        $request->validate([
            'name' => 'required|min:3|max:25',
            'username' => 'required|unique:clients,username,'.$client->username.',username|min:4|max:14',
            'email' => 'required|unique:clients,email,'.$client->email.',email',
            'phone' => 'required|unique:clients,phone,'.$client->phone.',phone',
            'cin' => 'required|unique:clients,cin,'.$client->cin.',cin',
            'address' => 'required',


        ]);


            $data['image'] =  $name= ImageController::updateImage( $request,$request->username,$request->id,'clients','image','clients');

        $data = $request->all();


        Session()->flash('message',trans('site.client_edit_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.client_add_success'));
        $client->update($data);




        return redirect()->route('admin.clients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        dd('hello delete');
    }
}
