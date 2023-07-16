<?php

namespace App\DataTables\Admin;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
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

            ->addColumn('user', function($row) {
                return $row['user'][0]->name;
            })
            ->addColumn('email', function($row) {
                return $row['user'][0]->email;
            })
            ->addColumn('title', function($row) {
                return $row['ebook'][0]->title;
            })
            ->addColumn('writer', function($row) {
                return $row['ebook'][0]->writer;
            })
            ->editColumn('date', function($row) {
                return date('F d, Y h:i A', strtotime($row->created_at));
            })
            ->editColumn('status', function($row) {
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
                            <select name="payment_status" class="form-control form-control-sm" onchange="return submit()">
                                <option value="Pending" $pending>Pending</option>
                                <option value="Completed" $completed>Completed</option>
                                <option value="Rejected" $rejected>Rejected</option>
                            </select>
                        </form
                        HTML;
            })
            ->rawColumns(['status']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        return Rent::with('ebook')->with('user')->newQuery();
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
            Column::make('user'),
            Column::make('email'),
            Column::make('title'),
            Column::make('writer'),
            Column::make('date')->name('created_at'),
            Column::make('status')
                ->name('payment_status')
                ->searchable(false)
                ->printable(false)
                ->exportable(false)
                ->width(100)

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
