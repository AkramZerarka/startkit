<?php

namespace App\View\Pages\Auth\Password;

use App\Providers\RouteServiceProvider;
use Livewire\Component;

class Confirm extends Component
{
    public $password = '';

    public function confirm()
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function render()
    {
        return view('pages.auth.password.confirm');
    }
}
