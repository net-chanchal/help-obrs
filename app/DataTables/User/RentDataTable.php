<?php

namespace App\DataTables\User;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('title', function($row) {
                return $row['ebook'][0]->title;
            })
            ->addColumn('writer', function($row) {
                return $row['ebook'][0]->writer;
            })
            ->addColumn('publisher', function($row) {
                return $row['ebook'][0]->publisher;
            })
            ->addColumn('pages', function($row) {
                return $row['ebook'][0]->pages;
            })
            ->editColumn('payment_status', function($row) {
                if ($row->payment_status == 'Completed') {
                    return '<span class="badge badge-success">Completed</span>';
                }
                else if ($row->payment_status == 'Pending') {
                    return '<span class="badge badge-warning">Pending</span>';
                }
                else {
                    return '<span class="badge badge-danger">Rejected</span>';
                }
            })
            ->addColumn('date', function($row) {
                return date('F d, Y h:i A', strtotime($row->created_at));
            })
            ->addColumn('action', function($row) {
                $view_url = (($row->payment_status == 'Completed')? $row['ebook'][0]->book_url: 'javascript:void(0)');
                $target = (($row->payment_status == 'Completed')? 'target="_blank"': '');

                return <<<HTML
                        <a href="$view_url" $target title="Read Ebook" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                        HTML;
            })

            ->rawColumns(['payment_status','action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        return Rent::with('ebook')->newQuery()->where('user_id', Auth::user()->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0, 'asc');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('title'),
            Column::make('writer'),
            Column::make('publisher'),
            Column::make('pages'),
            Column::make('date'),
            Column::make('payment_status'),
            Column::make('action')
                ->searchable(false)
                ->orderable(false)
                ->printable(false)
                ->exportable(false)
                ->width(20)

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Ebook_' . date('YmdHis');
    }
}
