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

    <input list="brow">
    <datalist id="brow">
        <option value="Internet Explorer">
        <option value="Firefox">
        <option value="Chrome">
        <option value="Opera">
        <option value="Safari">
    </datalist>
    </body>
    </html>
    <section class="content">
        @if(Session()->has('message'))
            <p class="alert {{ Session()->get('alert-class') }}">{{ Session()->get('message') }}</p>
        @endif
            <div class="divbox">
                <h2><i class="fa fa-trash"></i> Supression</h2>

                <p>Are you sure to you want to suprimer ?</p>
                <div style="{{app()->getLocale()=='ar'?'float:left':'float:right'}}">
                    <button onclick="suprimer(true)" class="btn btn-danger ouibtn">Oui</button>
                    <button onclick="suprimer(false)" class="btn btn-info nonbtn">Non</button>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                        {{csrf_field()}}
                        {!! $dataTable->table(
                        [
                            'data-vertable' =>"ver3",
                            'class'         =>'table table-bordered table-striped table-responsive',
                            'id'         =>'example1'
                        ],true
                        )!!}


                    </div>
                </div>


    </section>

@push('js')

    {!! $dataTable->scripts()  !!}
@endpush
@push('Sjs')
<script type="text/javascript">
    function suprimer(choix=null) {


        if(choix==null){
            $('.divbox').show();
            return false;
        }
        if(choix != null){

            $('.divbox').hide();
            if(choix == true){
                $('.btnsup').click();
            }

        }

    }
</script>

@endpush
@endsection
