<?php

namespace App\DataTables;

//use App\UserDatatable;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class UserDatatable extends DataTable
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
            ->addColumn('action', function ($user){
                return view('admin.users.actions.action',compact('user'))->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\UserDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return User::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        return $this->builder()
                    ->setTableId('userdatatable-table')
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
                                      this.api().columns([0,1,2,3]).every(function () {
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

                        Button::make(['extend'=>'create','className'=>'btnext dropbtn hasPerm','text'=>'<i class="fa fa-plus" aria-hidden="true"> </i>']),
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
            Column::computed('name')
                ->addClass('text-center')
                ->title(trans(("site.name")))
                ->orderable(true)
                ->searchable(true),
            Column::computed('username')
                ->addClass('text-center')
                ->title(trans(("site.username")))
                ->orderable(true)
                ->searchable(true),
            Column::computed('email')
                ->addClass('text-center')
                ->title(trans(("site.email")))
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
        return 'User_' . date('YmdHis');


    }
}
