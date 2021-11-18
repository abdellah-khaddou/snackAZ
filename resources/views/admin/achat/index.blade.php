@extends('admin.index')

@section('content-header')
    <style>
        #example1_filter label{
        {{app()->getLocale()=='ar'?'float:left':''}}
}

    </style>


    <li  class="libefor active">@lang('site.'.$title)</li>


@endsection
@section('content')

    <div class="container" style="width: 100%">

        <div class="cart-content container" style="width: 100%">
            <div class="heading" id="headCart" style="display: none">
                <h1>
                    <span class="shopper"><i style="color: white" class="shopping-cart"></i></span> @lang('site.shopping_Cart')
                </h1>

                <a  class=" pointer visibility-cart transition">O</a>
            </div>

            <div class="cart transition is-close is-closed">

                @if(session()->has('cart') )
                <div style="margin-bottom: 0" id="table_achat-pro" class="table ">

                    <div class="layout-inline row th">
                        <div class="col col-pro">@lang('site.produit')</div>
                        <div style="width: 11%" class="col col-price align-center ">
                            @lang('site.prix_achat')
                        </div>
                        <div class="col col-qty align-center">@lang('site.qte')</div>
                        <div style="width: 21%" class="col">@lang('site.fournisseur')</div>
                        <div class="col">@lang('site.total')</div>
                    </div>

                        <form action="{{route('admin.livrisons.store')}}" method="post">
                            {{csrf_field()}}
                    @foreach($produitsCart as $index =>$produit)
                            <input type="hidden" name="user" value="{{auth()->user()->id}}">
                            <div class="layout-inline row {{$index%2==0?'row-bg2':''}}">
                                <div class="col col-pro layout-inline">
                                    <img style="margin-left: 10px;" src="{{asset('/storage/produits/'.$produit['item']['image'])}}" alt="produit" />
                                    <p>{{$produit['item']['name']}} <i style="color: red"  onclick="delete_to_cart( '{{route('admin.achat.delete',$produit['item']['id'])}}' )" class=" pointer fa fa-trash"></i></p>
                                </div>
                                <div class="col col-price col-numeric align-center ">
                                    <p>{{$produit['onePrice']}} <span>@lang('site.dhs')</span></p>
                                    <input type="hidden" name="prix[]" value="{{$produit['onePrice']}}">
                                </div>

                                <div class="col col-qty  layout-inline">
                                    <a onclick="en_mins_qte(this)"  class="pointer qty qty-minus "><spa style="position: relative;top: -3px;">-</span></a></a>

                                    <input name="qte[]" class="qte_change" onchange="qte_change_achat(this)" type="number" value="{{$produit['qty']}}" />
                                    <a onclick="en_plus_qte(this)"  class="pointer qty qty-plus"><spa style="position: relative;top: -3px;">+</span></a>
                                </div>
                                <input class="url_cart_change hidden_plus" type="hidden" value="{{route('admin.achat.change',$produit['item']['id'])}}">
                                <input type="hidden" name="produits[]" value="{{$produit['item']['id']}}">
                                <div style="width: 20%;padding: 1em 0;" class="col col-vat col-numeric">
                                    <select  style="font-size: 12px" class="select-css" name="fournisseur[]">
                                        @if(!empty($fournisseurs))
                                            @foreach($fournisseurs as $forni)
                                                <option value="{{$forni->id}}">{{$forni->name}}</option>
                                            @endforeach
                                        @else
                                            <option>@lang('site.no_fournisseurs')</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="col col-total col-numeric">

                                    <p>{{$produit['price']}}<span> @lang('site.dhs')</span></p>
                                </div>

                            </div>


                    @endforeach





                    <div class="tf">
                        <div class="row layout-inline">
                            <div style="width: 98%;padding: 5px 93px" class="col" style="padding: 0">
                                <button style="    padding-bottom: 5px;padding-top: 5px;float: left" class="btn btn-success" type="submit" >@lang('site.achat')</button>
                                <p>@lang('site.total') : <span> {{$totalprice}} @lang('site.dhs')</span> </p>
                            </div>

                        </div>

                    </div>
                </div>
                    </form>
                @endif

            </div>
        </div>


        <div class="container">

            <div class="row">
                <div >
                    <!-- Custom Tabs -->
                    <div style="margin-top: 20px" class="nav-tabs-custom">
                        <ul class="nav nav-tabs filterProducts">
                            @foreach($catagories as $index=>$cat)
                                <li id="{{'pro'.$cat->id}}" class="{{$index==0?'active':''}}"><a href="" data-toggle="tab">{{$cat->name}}</a></li>
                            @endforeach


                            <span onclick="openCloseCart()" style=" cursor: pointer;display: inline-block;padding-top: 8px"><i class="shopping-cart animate-cart"><span id="badge" class="badge nnb_pro_cart">{{Session::has('cart')? session()->get('cart')->totalQty:''}}</span></i></span>
                        </ul>

                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->
            </div>
            <div class="row" style="width:90%">
                <div >
                    @foreach($produits as $pro)

                        <div  class="product-cat {{'pro'.$pro->catagorie_id}} col-md-2 col-sm-6">
                            <div class="product-grid3" style="border: 1px solid #ccc;">
                            <div class="product-image3" >
                                <a href="#">
                                    <img class="pic-1" src="{{asset('/storage/produits/'.$pro->image)}}" />
                                    <img class="pic-2" src="{{asset('/storage/produits/'.$pro->image)}}" />

                                </a>
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
                                    <li><a  class="add-to-cart"  onclick="add_to_cart({{$pro->id}},{{Session::has('cart')? 0:1}})"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>

                            </div>
                            <div class="product-content">
                                <h3 class="title"><a class="product_name" href="#">{{$pro->name}}</a></h3>
                                <div class="price">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    @php
                                        if(session()->has('cart')){
                                             if($produitsCart){
                                                    if(array_key_exists($pro->id,$produitsCart)){
                                                        $fixprice = $produitsCart[$pro->id]['onePrice'];
                                                    }else{
                                                        $fixprice = null;
                                                    }
                                                }
                                        }
                                    @endphp
                                    <input class="prix prix_achat_input {{'prix'.$pro->id}}"  type="text" value="{{ isset($fixprice)  ? $fixprice:''}}" placeholder="@lang('site.prix_achat')">
                                    <span  style="{{app()->getLocale() =='fr'?'left:77px':''}}" class="dhs">@lang('site.dhs')</span>
                                    <input class="qte prix_achat_input {{'qte'.$pro->id}}"  type="number" min="1" value="1">
                                    <input class="{{'url_cart'.$pro->id}}" type="hidden" value="{{route('admin.achat.add',$pro->id)}}">

                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
        </div>
        </div>
        <hr>
    </div>



@endsection
