@extends('admin.index')

@section('content')





    <section class="content">


        <div class="row">

            {{-- categories--}}
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>122</h3>

                        <p>111</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{--products--}}
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>11</h3>

                        <p>@lang('site.products')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">#pro <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{--clients--}}
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>222</h3>

                        <p>@lang('site.clients')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="#" class="small-box-footer">clientdd <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            {{--users--}}
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>1</h3>

                        <p>@lang('site.users')</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div><!-- end of row -->

        <div class="box box-solid">

            <div class="box-header">
                <h3 class="box-title">Sales Graph</h3>
            </div>
            <div class="box-body border-radius-none">
                <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
        </div>

    </section><!-- end of content -->




@endsection
