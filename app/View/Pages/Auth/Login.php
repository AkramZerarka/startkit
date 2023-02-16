<?php

namespace App\View\Pages\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Livewire\Component;

class Login extends Component
{
    public $state;
    public function authenticate()
    {
        $request = new LoginRequest();
        $this->validate($request->rules());
        $request->authenticate($this->state);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function render()
    {
        return view('pages.auth.login')->layout('components.templates.auth');
    }
}
