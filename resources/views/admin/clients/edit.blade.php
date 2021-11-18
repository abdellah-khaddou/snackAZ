@extends('admin.index')

@section('content-header')



    <li><a href="{{url('/admin/clients')}}">@lang('site.'.$title)
        </a></li>
    <li style="color:blue" class="blue active">@lang('site.edit')</li>


@endsection
@section('content')

    <section class="content">
        <!-- general form elements -->
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <div class="container">
            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.clients.update',$client->id) }}">
                {{csrf_field()}}
                {{method_field('put')}}

                <div class="row">
                    <h2 style="color: #3c8dbc">@lang('site.edituser')</h2>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('name') is-invalid @enderror" name="name" type="text" value="{{$client->name}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="input-group input-group-icon ">

                        <input class="@error('username') is-invalid @enderror" name="username" type="text" placeholder="@lang('site.username')" value="{{$client->username}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('username')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('email') is-invalid @enderror" name="email" type="email" placeholder="@lang('site.email')" value="{{$client->email}}"/>
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                        @error('email')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('phone') is-invalid @enderror" name="phone" type="tel" placeholder="@lang('site.phone')" value="{{$client->phone}}"/>
                        <div class="input-icon"><i class="fa fa-phone"></i></div>
                        @error('phone')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('cin') is-invalid @enderror" name="cin" type="text" placeholder="@lang('site.cin')" value="{{$client->cin}}"/>
                        <div class="input-icon"><i class="fa fa-id-card"></i></div>
                        @error('cin')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('address') is-invalid @enderror" name="address" type="text" placeholder="@lang('site.address')" value="{{$client->address}}"/>
                        <div class="input-icon"><i class="fa fa-address-book"></i></div>
                        @error('address')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon ">


                        <input id="image"  style="display:none" class="@error('image') is-invalid @enderror" name="image" type="file" value="{{asset('/storage/users/'.$client->image)}}" />
                        <input name="xxx" style="background: #f9f9f9;color: #666;padding: 10px 5px;border: 1px solid #555!important;font-size: 17px;" type="button" class="btn btn-dropbox" onclick="$('#image').click();" value="@lang('site.download')">
                        <div class="input-icon"><i class="fa fa-image"></i></div>
                        @error('image')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <img id="image-show" width="100px"  src="{{asset('/storage/users/'.$client->image)}}" alt="your image" />
                    </div>




                    <div class="row">

                        <div class="input-group input-group-icon">
                            <style>
                                .submitbtn,.resetebtn{
                                {{app()->getLocale() == 'ar'? 'float:left;':'float:right;'}}
}

                            </style>
                            <label class="btn btn-success submitbtn">
                                <i class="fa fa-edit"></i>
                                <input  class=" create_input" type="submit" value="@lang('site.edit')"/>
                            </label>
                            <label class="btn btn-warning resetebtn">
                                <i class="fa fa-refresh"></i>
                                <input class="create_input" type="reset" value="@lang('site.reset')"/>

                            </label>

                        </div>
                    </div>

                </div>

            </form>
        </div>
        <!-- /.card -->
    </section>


@endsection
