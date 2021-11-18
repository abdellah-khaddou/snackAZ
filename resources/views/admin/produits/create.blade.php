@extends('admin.index')

@section('content-header')



    <li><a href="{{url('/admin/produits')}}">@lang('site.'.$title)
      </a></li>
    <li style="color:blue" class="blue active">@lang('site.create')</li>


@endsection
@section('content')

    <section class="content">
        <!-- general form elements -->
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <div class="container">
            <form  method="POST" action="{{ route('admin.produits.store') }}" enctype="multipart/form-data" files=true>

                {{csrf_field()}}
                {{method_field('post')}}

                <div class="row">
                    <h2 style="color: #3c8dbc">@lang('site.addproduit')</h2>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('name') is-invalid @enderror" name="name" type="text" placeholder="@lang('site.name')" value="{{old('name')}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('min_qte') is-invalid @enderror" name="min_qte" type="text" placeholder="@lang('site.min_qte')" value="{{old('qte')}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('min_qte')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('qte') is-invalid @enderror" name="qte" type="text" placeholder="@lang('site.qte')" value="{{old('qte')}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('qte')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group input-group-icon">
                        <input class="@error('desc') is-invalid @enderror" name="desc" type="tel" placeholder="@lang('site.desc')" value="{{old('desc')}}"/>
                        <div class="input-icon"><i class="fa fa-phone"></i></div>
                        @error('desc')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('prix_vend') is-invalid @enderror" name="prix_vend" type="text" placeholder="@lang('site.prix_vend')" value="{{old('prix_vend')}}"/>
                        <div class="input-icon"><i class="fa fa-id-card"></i></div>
                        @error('prix_vend')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div  class=" input-group input-group-icon">

                      <select   class="select-css @error('list_de_vend') is-invalid @enderror" name="list_de_vend">
                          <option value="">@lang('site.list_de_vend')</option>
                          <option value="1">@lang('site.yes')</option>
                          <option value="0">@lang('site.no')</option>
                      </select>
                    @error('list_de_vend')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="input-group input-group-icon"  >

                    <select  class="select-css" name="catagorie_id" class="selectcat @error('catagorie_id') is-invalid @enderror">
                        <option value="">@lang('site.choix_catagory')</option>
                        @foreach( $catagories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                        @error('catagorie_id')
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
