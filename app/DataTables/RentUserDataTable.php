<?php

namespace App\DataTables;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RentUserDataTable extends DataTable
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
            ->addColumn('date', function($row) {
                return date('F d, Y h:i A', strtotime($row->created_at));
            })
            ->addColumn('book', function($row) {
                $csrf = csrf_field();
                $action = route('admin.rents.status');
                $id = $row->id;
                $pending = ($row->payment_status == 'Pending')? 'selected': '';
                $completed = ($row->payment_status == 'Completed')? 'selected': '';
                $rejected = ($row->payment_status == 'Rejected')? 'selected': '';

                return <<<HTML
                        <form action="$action" class="d-inline" method="post">
                            $csrf
                            <input type="hidden" name="id" value="$id">
                            <select name="payment_status" onchange="return submit()">
                                <option value="Pending" $pending>Pending</option>
                                <option value="Completed" $completed>Completed</option>
                                <option value="Rejected" $rejected>Rejected</option>
                            </select>
                        </form
                        HTML;
            })
            ->rawColumns(['book']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        return Rent::with('ebook')->newQuery();
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
            Column::make('book')
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
