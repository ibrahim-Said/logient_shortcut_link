<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $dataColumn;
    public $title;
    public $sspUrl;
    public $filterColumns;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$dataColumn,$sspUrl,$filterColumns=array())
    {
        $this->sspUrl=$sspUrl;
        $this->title=$title;
        $this->dataColumn=$dataColumn;
        $this->filterColumns =$filterColumns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-table');
    }
}
