<?php

namespace App\DataTables;

use App\Models\Ebook;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EbookUserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->editColumn('status', function(Ebook $ebook) {
                $status = ($ebook->status? 'Active': 'Inactive');
                $class = ($ebook->status? 'badge-success': 'badge-danger');
                return "<span class=\"badge $class\">$status</span>";
            })

            ->editColumn('price', function (Ebook $ebook) {
                return "&#2547;" . number_format($ebook->price, 2);
            })

            ->addColumn('action', function(Ebook $ebook) {
                $view_url = ($ebook->status)? route('user.ebooks.show', $ebook->id): '#';
                $disabled_color = ($ebook->status)? 'btn-light': 'btn-danger';
                $disabled = ($ebook->status)? '': 'disabled';
                $ebook_id = $ebook->id;
                $user_id = Auth::user()->id;
                $csrf = csrf_field();
                $action = route('user.ebooks.rent');

                return <<<HTML
                        <a href="$view_url" title="View Detail" class="btn btn-sm $disabled"><i class="fa fa-eye"></i></a>
                        <form action="$action" class="d-inline" method="post">
                            $csrf
                            <input type="hidden" name="ebook_id" value="$ebook_id">
                            <input type="hidden" name="user_id" value="$user_id">
                            <button type="submit" title="Rent" class="btn btn-sm $disabled_color" $disabled><i class="fa fa-shopping-bag"></i></button>
                        </form
                        HTML;
            })

            ->rawColumns(['price', 'status', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Ebook $model): QueryBuilder
    {
        return $model->newQuery();
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
            Column::make('price'),
            Column::make('status'),
            Column::make('action')
                ->searchable(false)
                ->orderable(false)
                ->printable(false)
                ->exportable(false)
                ->width(80)
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
