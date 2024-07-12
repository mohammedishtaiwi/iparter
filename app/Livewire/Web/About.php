<?php

namespace App\Livewire\Web;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class About extends Component implements HasForms
{
    use InteractsWithForms;

  

  

   

    public function render(): View
    {
        return view('livewire.web.about')->layout('components.layouts.web');
    }

  
}
