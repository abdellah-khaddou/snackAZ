@extends('admin.index')

@section('content-header')



    <li><a href="{{url('/admin/clients')}}">@lang('site.'.$title)
      </a></li>
    <li style="color:blue" class="blue active">@lang('site.create')</li>


@endsection
@section('content')

    <section class="content">
        <!-- general form elements -->
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <div class="container">
            <form  method="POST" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data" files=true>

                {{csrf_field()}}
                {{method_field('post')}}

                <div class="row">
                    <h2 style="color: #3c8dbc">@lang('site.addclient')</h2>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('name') is-invalid @enderror" name="name" type="text" placeholder="@lang('site.name')" value="{{old('name')}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon ">

                        <input class="@error('username') is-invalid @enderror" name="username" type="text" placeholder="@lang('site.username')" value="{{old('username')}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('username')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group input-group-icon">
                        <input class="@error('email') is-invalid @enderror" name="email" type="email" placeholder="@lang('site.email')" value="{{old('email')}}"/>
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                        @error('email')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('phone') is-invalid @enderror" name="phone" type="tel" placeholder="@lang('site.phone')" value="{{old('phone')}}"/>
                        <div class="input-icon"><i class="fa fa-phone"></i></div>
                        @error('phone')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('cin') is-invalid @enderror" name="cin" type="text" placeholder="@lang('site.cin')" value="{{old('cin')}}"/>
                        <div class="input-icon"><i class="fa fa-id-card"></i></div>
                        @error('cin')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('address') is-invalid @enderror" name="address" type="text" placeholder="@lang('site.address')" value="{{old('address')}}"/>
                        <div class="input-icon"><i class="fa fa-address-book"></i></div>
                        @error('address')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('password') is-invalid @enderror" name="password" type="password" placeholder="@lang('site.password')"/>
                        <div class="input-icon"><i class="fa fa-key"></i></div>
                        @error('password')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" placeholder="@lang('site.repassword')"/>
                        <div class="input-icon"><i class="fa fa-key"></i></div>
                        @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group input-group-icon ">


                        <input id="image"  style="display:none" class="@error('image') is-invalid @enderror" name="image" type="file" />
                        <input name="xxx" style="background: #f9f9f9;color: #666;padding: 10px 5px;border: 1px solid #555!important;font-size: 17px;" type="button" class="btn btn-dropbox" onclick="$('#image').click();" value="@lang('site.download')">
                        <div class="input-icon"><i class="fa fa-image"></i></div>
                        @error('image')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <img id="image-show" width="100px"  src="{{asset('/storage/clients/avatar.png')}}" alt="your image" />
                    </div>



                <div class="row">

                    <div class="input-group input-group-icon">
                        <style>
                            .submitbtn,.resetebtn{
                            {{app()->getLocale() == 'ar'? 'float:left;':'float:right;'}}
                             }

                        </style>
                        <label class="btn btn-success submitbtn">
                            <i class="fa fa-check"></i>
                             <input  class=" create_input" type="submit" value="@lang('site.submit')"/>
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
