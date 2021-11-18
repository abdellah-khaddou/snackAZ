@extends('admin.index')

@section('content-header')



    <li><a href="{{url('/admin/employes')}}">@lang('site.'.$title)
      </a></li>
    <li style="color:blue" class="blue active">@lang('site.create')</li>


@endsection
@section('content')

    <section class="content">
        <!-- general form elements -->
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <div class="container">
            <form  method="POST" action="{{ route('admin.employes.store') }}" enctype="multipart/form-data" files=true>

                {{csrf_field()}}
                {{method_field('post')}}

                <div class="row">
                    <h2 style="color: #3c8dbc">@lang('site.addemploye')</h2>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('name') is-invalid @enderror" name="name" type="text" placeholder="@lang('site.name')" value="{{old('name')}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('gard') is-invalid @enderror" name="gard" type="text" placeholder="@lang('site.gard')" value="{{old('gard')}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('gard')
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
                        <input class="@error('sold') is-invalid @enderror" name="sold" type="text" placeholder="@lang('site.sold')" value="{{old('sold')}}"/>
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
