<?php

namespace App\Http\Controllers\admin;
use App\DataTables\UserDatatable;
use App\User;

use Illuminate\Contracts\Filesystem\FileExistsException;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title='users';

    public function __construct()
    {
        $this->middleware(['permission:read-users'])->only('index');
        $this->middleware(['permission:update-users'])->only('edit');
        $this->middleware(['permission:delete-users'])->only('destroy');
        $this->middleware(['permission:create-users'])->only('create');
    }

    public function index(UserDatatable $user)
    {

        //
       return $user->render('admin.users.index',['title'=> $this->title,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.users.create',['title'=>$this->title]);
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
            'username' => 'required|unique:users|min:4|max:14',
            'email'    => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed',
            'image'    => 'mimes:jpeg,jpg,png,gif',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name  = $request->username.$request->id.date("m.d.y").'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/users');
            $image->move($destinationPath, $name);

        }

        $data = $request->except(['password','image','password_confirmation','permission']);
        if(isset($name)){
            $data['image'] = $name;
        }
        $data['password']= bcrypt($request->password);


        Session()->flash('message',trans('site.user_add_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.user_add_success'));
        $user = User::create($data);
        $user->attachRole('admin');
        if(!empty($request->permission)){
            $user->syncPermissions($request->permission);
        }


        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        //dd($user);
        return view('admin.users.edit',compact('user'))->with('title',$this->title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

        $request->validate([
            'name' => 'required|min:3|max:25',
            'username' => 'required|unique:users,username,'.$user->username.',username|min:4|max:14',
            'email' => 'required|unique:users,email,'.$user->email.',email',


        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image'    => 'mimes:jpeg,jpg,png,gif',
            ]);

            $image = $request->file('image');
            Storage::move('public/users/'.$user->image,'delete'.'public/users/'.$user->image);
            $name  = $request->username.$request->id.date("m.d.y").'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/users');
            $image->move($destinationPath, $name);
            $data['image'] = $name;



        }
        $data = $request->except(['permission']);


        Session()->flash('message',trans('site.user_edit_success'));
        Session()->flash('alert-class', 'alert-success success');
        //session()->flash('success',trans('site.user_add_success'));
        $user->update($data);

        if(!empty($request->permission)){
            $user->syncPermissions($request->permission);
        }


        return redirect()->route('admin.users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        dd('hello delete');
    }
}
