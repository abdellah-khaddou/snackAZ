@extends('admin.index')

@section('content-header')



    <li><a href="{{url('/admin/catagories')}}">@lang('site.'.$title)
      </a></li>
    <li style="color:blue" class="blue active">@lang('site.create')</li>


@endsection
@section('content')

    <section class="content">
        <!-- general form elements -->
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <div class="container">
            <form  method="POST" action="{{ route('admin.catagories.store') }}" enctype="multipart/form-data" files=true>

                {{csrf_field()}}
                {{method_field('post')}}

                <div class="row">
                    <h2 style="color: #3c8dbc">@lang('site.addcatagorie')</h2>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('name') is-invalid @enderror" name="name" type="text" placeholder="@lang('site.name')" value="{{old('name')}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('name')
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
