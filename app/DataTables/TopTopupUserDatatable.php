<?php

namespace App\DataTables;

use App\Models\TopTopupUser;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TopTopupUserDatatable extends DataTable
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
            ->addIndexColumn()
            // ->addColumn('name', function($topUser){
            //     return $topUser->user->name;
            // })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TopTopupUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TopTopupUser $model)
    {
        // usleep( 100 * 10000 );
        return $model->with(['user' => function ($query) {
            $query->select(['id', 'name']);
        }]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('topuserdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(2,'desc')
                    ->parameters([
                        'lengthMenu' => [[2, 10, 50, 100], [2, 10, 50, 100]],
                        'paging' => true,
                        'searching' => true,
                        'info' => true,
                        'searchDelay' => 0,
                        'saveState' => true,
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex')->title('SL'),
            Column::make('name')->data('user.name')->name('user.name'),
            Column::make('count'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TopUser_' . date('YmdHis');
    }
}
