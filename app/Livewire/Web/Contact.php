<?php

namespace App\Livewire\Web;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\ContactUs;

class Contact extends Component implements HasForms
{
    use InteractsWithForms;

    public $name;
    public $email;
    public $message;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->required()
                ->label('Name')
                ->placeholder('Your name'),
            TextInput::make('email')
                ->email()
                ->required()
                ->label('Email')
                ->placeholder('Your email'),
            Textarea::make('message')
                ->required()
                ->label('Message')
                ->placeholder('Your message'),
        ];
    }

    public function submit()
    {
        $this->validate();

        // Save form data to the database
        ContactUs::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        // Clear form fields
        $this->resetForm();

        // Display a success message
        session()->flash('success', 'Your message has been sent successfully.');
    }

    public function render(): View
    {
        return view('livewire.web.contact')->layout('components.layouts.web');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->message = '';
    }
}
