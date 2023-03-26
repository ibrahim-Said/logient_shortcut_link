<?php

namespace App\ViewModels\Dashboard;

use App\Http\Controllers\Admin\DashboardController;
use Spatie\ViewModels\ViewModel;

class DashboardViewModel extends ViewModel
{
    public $mainTitle;

    public $secondTitle;

    public $thirdTitle;

    public $indexUrl = null;

    public function __construct()
    {
        $this->mainTitle = __('general.Dashboard');
        $this->secondTitle=__('general.Home');
        $this->thirdTitle=__('general.Dashboard');
        $this->indexUrl = action([DashboardController::class, 'index']); 
    }
}
