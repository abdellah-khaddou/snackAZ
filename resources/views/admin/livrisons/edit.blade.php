@extends('admin.index')

@section('content-header')



    <li><a href="{{url('/admin/produits')}}">@lang('site.'.$title)
        </a></li>
    <li style="color:blue" class="blue active">@lang('site.edit')</li>


@endsection
@section('content')

    <section class="content">
        <!-- general form elements -->
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <div class="container">
            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.produits.update',$produit->id) }}">
                {{csrf_field()}}
                {{method_field('put')}}

                <div class="row">
                    <h2 style="color: #3c8dbc">@lang('site.editproduit')</h2>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('name') is-invalid @enderror" name="name" type="text" value="{{$produit->name}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('min_qte') is-invalid @enderror" name="min_qte" type="text" placeholder="@lang('site.min_qte')" value="{{$produit->min_qte}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('min_qte')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" input-group input-group-icon ">
                        <input class="@error('qte') is-invalid @enderror" name="qte" type="text" placeholder="@lang('site.qte')" value="{{$produit->qte}}"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                        @error('qte')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group input-group-icon">
                        <input class="@error('desc') is-invalid @enderror" name="desc" type="tel" placeholder="@lang('site.desc')" value="{{$produit->desc}}"/>
                        <div class="input-icon"><i class="fa fa-phone"></i></div>
                        @error('desc')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">
                        <input class="@error('prix') is-invalid @enderror" name="prix" type="text" placeholder="@lang('site.prix')" value="{{$produit->prix}}"/>
                        <div class="input-icon"><i class="fa fa-id-card"></i></div>
                        @error('prix')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group input-group-icon">

                        <select class="select-css" name="list_de_vend">


                                @if($produit->list_de_vend ==1)
                                    <option  value="1">@lang('site.yes')</option>
                                @else
                                    <option value="0">@lang('site.no')</option>
                                @endif
                               <option value="">@lang('site.list_de_vend')</option>



                        </select>
                    </div>

                    <div >

                        <select  name="catagorie_id" class="select-css @error('catagorie_id') is-invalid @enderror">
                            <option value="{{$old_cat->id}}">{{$old_cat->name}}</option>
                            @foreach( $catagories as $cat)
                                @if($cat->id != $old_cat->id )
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endif
                            @endforeach
                        </select>

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
