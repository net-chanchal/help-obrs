<?php

namespace App\DataTables;

use App\Models\Ebook;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EbookDataTable extends DataTable
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
                $csrf = csrf_field();
                $method = method_field('delete');
                $action = route('admin.ebooks.destroy', $ebook->id);
                $view_url = route('admin.ebooks.show', $ebook->id);
                $edit_url = route('admin.ebooks.edit', $ebook->id);

                return <<<HTML
                        <a href="$view_url" class="btn btn-light btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="$edit_url" class="btn btn-light btn-sm"><i class="fa fa-edit"></i></a>
                        <form action="$action" method="post" class="d-inline">
                            $csrf
                            $method
                            <button class="btn btn-light btn-sm" onclick="return confirm('Are you confirm to delete?')"><i class="fa fa-trash"></i></button>
                        </form>
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
                ->width(120)
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
