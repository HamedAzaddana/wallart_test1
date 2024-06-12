<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Symfony\Component\Routing\Annotation\Route;

class FilePicker extends Component
{
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = 'file_path')
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $iframe_url = route('files_page')."/?template=file-picker&selector_fp=".$this->name;
        return view('components.file-picker',compact('iframe_url'));
    }
}
