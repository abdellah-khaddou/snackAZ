@extends('admin.index')

@section('content-header')



    <li><a href="{{url('/admin/employes')}}">@lang('site.'.$title)
        </a></li>
    <li style="color:blue" class="blue active">@lang('site.edit')</li>


@endsection
@section('content')

    <section class="content">
        <!-- general form elements -->
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <div class="container">
            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.employes.update',$employe->id) }}">
                {{csrf_field()}}
                {{method_field('put')}}

                <div class="row">
                    <h2 style="color: #3c8dbc">@lang('site.edituser')</h2>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('name') is-invalid @enderror" name="name" type="text" value="{{$employe->name}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="input-group input-group-icon ">

                        <input class="@error('gard') is-invalid @enderror" name="gard" type="text" placeholder="@lang('site.gard')" value="{{$employe->gard}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('gard')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group input-group-icon">
                        <input class="@error('phone') is-invalid @enderror" name="phone" type="tel" placeholder="@lang('site.phone')" value="{{$employe->phone}}"/>
                        <div class="input-icon"><i class="fa fa-phone"></i></div>
                        @error('phone')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('cin') is-invalid @enderror" name="cin" type="text" placeholder="@lang('site.cin')" value="{{$employe->cin}}"/>
                        <div class="input-icon"><i class="fa fa-id-card"></i></div>
                        @error('cin')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('address') is-invalid @enderror" name="address" type="text" placeholder="@lang('site.address')" value="{{$employe->address}}"/>
                        <div class="input-icon"><i class="fa fa-address-book"></i></div>
                        @error('address')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('sold') is-invalid @enderror" name="sold" type="text" placeholder="@lang('site.sold')" value="{{$employe->sold}}"/>
                        <div class="input-icon"><i class="fa fa-address-book"></i></div>
                        @error('sold')
                        <div class="error">{{ $message }}</div>
                        @enderror
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
