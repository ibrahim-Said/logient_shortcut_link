<?php

namespace App\ViewModels\ShortcutLinks;

use App\Http\Controllers\Admin\ShortcutLinkController;
use Spatie\ViewModels\ViewModel;

class ShortcutLinksViewModel extends ViewModel
{
    public $mainTitle;
    public $secondTitle;
    public $thirdTitle;
    public $indexUrl = null;
    public $DataTableTitle;
    public $dataTableColumn = [];
    public $sspUrl;
    public $shortcutLink;
    
    public function __construct($shortcutLink=null)
    {
        $this->shortcutLink=$shortcutLink;
        $this->indexUrl = action([ShortcutLinkController::class, 'index']); 
        $this->setTitles();
    }

    public function dataTableColumn()
    {
        return [
            array(
                'column_name' => 'name',
                'column_label' => __('general.Title'),
                'column_orderable' => true,
                'column_searchable' => true
            ),
            array(
                'column_name' => 'link',
                'column_label' => __('general.Link'),
                'column_orderable' => false,
                'column_searchable' => false
            ),
            array(
                'column_name' => 'shortcut_link',
                'column_label' => __('general.shortcut link'),
                'column_orderable' => false,
                'column_searchable' => false
            ),
            array(
                'column_name' => 'action',
                'column_label' => __('general.Action'),
                'column_orderable' => false,
                'column_searchable' => false
            )
        ];
    }
    public function sspUrl()
    {
        return route('shortcut-links.getAll');
    }
    public function setTitles()
    {
        switch (request()->route()->getName()) {
            case 'shortcut-links.index':
                $this->mainTitle =__('general.list of shortcut links');
                $this->secondTitle = __('general.Dashboard');
                $this->thirdTitle = __('general.list of shortcut links');
                $this->DataTableTitle = __('general.list of shortcut links');
                break;
            case 'home':
                $this->mainTitle =__('general.list of shortcut links');
                $this->secondTitle = __('general.Dashboard');
                $this->thirdTitle = __('general.list of shortcut links');
                $this->DataTableTitle = __('general.list of shortcut links');
                break;
            case 'shortcut-links.create':
                $this->mainTitle = __('general.Add shortcut link');
                $this->secondTitle =  __('general.Dashboard');
                $this->thirdTitle = __('general.Add shortcut link');
                break;
            case 'shortcut-links.edit':
                $this->mainTitle = __('general.Edit shortcut link');
                $this->secondTitle =  __('general.Dashboard');
                $this->thirdTitle = __('general.Edit shortcut link');
                break;
        };
    }
}
