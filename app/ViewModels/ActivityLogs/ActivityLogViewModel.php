<?php

namespace App\ViewModels\ActivityLogs;

use App\Http\Controllers\Admin\ActivityLogController;
use Spatie\ViewModels\ViewModel;

class ActivityLogViewModel extends ViewModel
{
    public $mainTitle;
    public $secondTitle;
    public $thirdTitle;
    public $indexUrl = null;
    public $DataTableTitle;
    public $dataTableColumn = [];
    public $sspUrl;
    
    public function __construct()
    {
        $this->indexUrl = action([ActivityLogController::class, 'index']); 
        $this->setTitles();
    }

    public function dataTableColumn()
    {
        return [
            array(
                'column_name' => 'ip',
                'column_label' => __('general.Ip'),
                'column_orderable' => true,
                'column_searchable' => true
            ),
            array(
                'column_name' => 'url',
                'column_label' => __('general.Url'),
                'column_orderable' => true,
                'column_searchable' => true
            ),
            array(
                'column_name' => 'agent',
                'column_label' => __('general.Agent'),
                'column_orderable' => true,
                'column_searchable' => true
            ),
            array(
                'column_name' => 'user',
                'column_label' => __('general.User'),
                'column_orderable' => false,
                'column_searchable' => false
            ),
            array(
                'column_name' => 'created_at',
                'column_label' => __('general.Date'),
                'column_orderable' => false,
                'column_searchable' => false
            )
        ];
    }
    public function sspUrl()
    {
        return route('activity-logs.getAll');
    }
    public function setTitles()
    {
        switch (request()->route()->getName()) {
            case 'activity-logs.index':
                $this->mainTitle =__('general.list of activity logs');
                $this->secondTitle = __('general.Dashboard');
                $this->thirdTitle = __('general.list of activity logs');
                $this->DataTableTitle = __('general.list of activity logs');
                break;
        };
    }
}
