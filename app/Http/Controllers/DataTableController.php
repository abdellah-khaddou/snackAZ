<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function lang(){
        $langTable=[
            "sProcessing"=> trans('site.sProcessing'),
            "sLengthMenu"=> trans('site.sLengthMenu'),
            "sZeroRecords"=> trans('site.sZeroRecords'),
            "sEmptyTable"=> trans('site.sEmptyTable'),
            "sInfo"=> trans('site.sInfo'),
            "sInfoEmpty"=> trans('site.sInfoEmpty'),
            "sInfoFiltered"=>trans('site.sInfoFiltered'),
            "sInfoPostFix"=> trans('site.sInfoPostFix'),
            "sSearch"=> trans('site.sSearch'),
            "sUrl"=> trans('site.sUrl'),
            "sInfoThousands"=> trans('site.sInfoThousands'),
            "sLoadingRecords"=>trans('site.sLoadingRecords'),
            "oPaginate"=> [
            "sFirst"=> trans('site.sFirst'),
                "sLast"=> trans('site.sLast'),
                "sNext"=> trans('site.sNext'),
                "sPrevious"=> trans('site.sPrevious')
            ],
            "oAria" => [
            "sSortAscending" => trans('site.sSortAscending'),
                "sSortDescending" => trans('site.sSortDescending')
            ]


        ];

        return response()->json($langTable);

    }
    //
}
