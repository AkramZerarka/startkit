<?php

namespace App\View\Pages\Auth\Password;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class Email extends Component
{


    public $email;

    public $emailSentMessage = false;

    public function sendResetPasswordLink()
    {
        $this->validate([
            'email' => ['required', 'email'],
        ]);

        $response = $this->broker()->sendResetLink(['email' => $this->email]);

        if ($response == Password::RESET_LINK_SENT) {
            $this->emailSentMessage = trans($response);

            return;
        }

        $this->addError('email', trans($response));
    }

    public function broker()
    {
        return Password::broker();
    }
    public function render()
    {
        return view('pages.auth.password.email')->layout('components.templates.auth');
    }
}
