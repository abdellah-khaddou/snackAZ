<?php

namespace App\DataTables;

use App\Fournisseur;


use App\Livrison;
use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Support\Facades\DB;

class LivrisonDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($livrison){
                return view('admin.livrisons.actions.action',compact('livrison'))->render();
            })->addColumn('prix', function ($livrison){
                $arryliv = DB::table('livrison_produit')->where('livrison_id',$livrison->id)->get();
                $total=0;

                foreach ($arryliv as $liv){
                    $multi = $liv->quntite * $liv->prix;
                    $total +=$multi;
                }
                return $total.' '.trans('site.dhs');
            })->editColumn('fournisseur_id',function ($livrison) {

                $forni = Fournisseur::find($livrison->fournisseur_id);
                return $forni->name;
            }
            )->editColumn('user_id',function ($livrison) {

                $user = User::find($livrison->user_id);
                return $user->name;

            })->filterColumn('fournisseur_id', function ($query, $keyword) {

                $query -> whereRaw("select fournisseurs.id from fournisseurs where fournisseurs.name  like ? and livrisons.fournisseur_id=fournisseurs.id ", ["%$keyword%"]);
            })->filterColumn('user_id', function ($query, $keyword) {

                $query -> whereRaw("select users.id from users where users.name  like ? and livrisons.user_id=users.id ", ["%$keyword%"]);
            });
    }

    public function query(Livrison $model)
    {
        return Livrison::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        return $this->builder()
            ->setTableId('livrisondatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters(
                [
                    'responsive' => true,
                    'lengtMenu'=>[[10,25,50,100],[10,25,50,'all']],
                    'dom'=>'Blfrtip',
                    'order'=>[[0,'desc']],
                    'select' => [
                        'style' => 'os',
                        'selector' => 'td:first-child',
                    ],

                    'buttons'=>[
                        ['extend'=>'export','className'=>'','text'=>'
                                <div class="dropdown">
                                <button style=" padding: 6px" class="dropbtn btnext"><i class="fa fa-download"></i> </button>
                                  <div class="dropdown-content">
                                    <li onclick="csvbtn()" class="csvbtn"><i class="fa fa-file" aria-hidden="true"> csv</i> </li>
                                    <li onclick="pdfbtn()" class="pdfbtn"><i class="fa fa-file-pdf-o" aria-hidden="true"> pdf</i> </li>
                                    <li onclick="excelbtn()" class="excelbtn"><i class="fa fa-file-excel-o" aria-hidden="true"> excel</i> </li>
                                  </div>    
                                  </div>
                                '
                        ],


                    ],
                    'language'=>['url'=>url('datatable/lang')],
                    'initComplete'=> "function () {
                                    
                                            
                                      this.api().columns([0,1,2,4]).every(function () {
                                         columns: [
                                                {data: 'catagorie_id', name: 'catagories.name'},
                                             
                                            ]
                                    var column = this;
                                    
                                    //var input = document.createElement(\"input\");
                                    var input = $(\" <input type='text' class='inputSearch'/> \");
                                        
                                    $(input).appendTo($(column.footer()).empty())
                                    .on('keyup', function () {
                                        column.search($(this).val(), false, false, true).draw();
                                    });
                                });
                            }",

                ]
            )
            ->buttons(


                Button::make(['extend'=>'print','className'=>'btnext dropbtn','text'=>'<i class="fa fa-print" aria-hidden="true"> </i>']),
                Button::make(['extend'=>'reset','className'=>'btnext dropbtn','text'=>'<i class="fa fa-undo" aria-hidden="true"> </i>']),
                Button::make(['extend'=>'reload','className'=>'btnext dropbtn','text'=>'<i class="fa fa-refresh" aria-hidden="true"> </i>']),
                Button::make(['extend'=>'pdf','className'=>'btnpdf dropbtn','text'=>'pdf']),
                Button::make(['extend'=>'excel','className'=>'btnexcel dropbtn','text'=>'excel']),
                Button::make(['extend'=>'csv','className'=>'btncsv dropbtn','text'=>'csv'])



            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::computed('id')
                ->addClass('text-center')
                ->title(trans(("site.id")))
                ->orderable(true)
                ->searchable(true),
            Column::computed('user_id')
                ->addClass('text-center')
                ->title(trans(("site.acheteur")))
                ->orderable(true)
                ->searchable(true),
            Column::computed('fournisseur_id')
                ->addClass('text-center')
                ->title(trans(("site.vendeur")))
                ->orderable(true)
                ->searchable(true),
            Column::computed('prix')
                ->addClass('text-center')
                ->title(trans(("site.prix")))
                ->orderable(true)
                ->searchable(true),
            Column::computed('created_at')
                ->addClass('text-center')
                ->title(trans(("site.temps")))
                ->orderable(true)
                ->searchable(true),


            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title(trans(("site.action")))->with(),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */

    protected function filename()
    {
        return 'livrison' . date('YmdHis');


    }
}
