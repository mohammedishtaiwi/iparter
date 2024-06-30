<?php

namespace App\Livewire\Web;

use App\Models\Article;
use App\Models\NewsLetter;
use App\Models\Service;
use App\Settings\HomepageContent;
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;

class Index extends Component implements HasForms
{
    use InteractsWithForms;

    public function mount()
    {
    }

   

    

    public function render(): View
    {
        return view('livewire.web.index')->layout('components.layouts.web');
    }
}