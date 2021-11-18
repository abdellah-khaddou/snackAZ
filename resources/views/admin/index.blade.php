
@include('admin.layout.head')
@include('admin.layout.header')
@include('admin.layout.aside')
    <style>
        .libefor:before {
            content: '>\00a0';
        }
    </style>

    <div style="min-height: 507px" class="content-wrapper" >

        <section class="content-header">

            <h1 style="{{ app()->getLocale() == 'ar' ? 'text-align: right;': 'text-align: left;' }}">@lang('site.'.$title)</h1>

            <ol class="breadcrumb">
                <li class="{{$title=='dashboard' ? 'active':''}}"><a href="{{url('/admin')}}">
                        <i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>

                @yield('content-header')

            </ol>
        </section>

            @include('admin.layout.message')
            @yield('content')




    </div><!-- end of content wrapper -->





@include('admin.layout.footer')
