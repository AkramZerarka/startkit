<?php

namespace App\View\Pages\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $state;
    public function register()
    {
        $request = new RegisterRequest();
        $this->validate($request->rules());
        $user = User::create([
            'name' => $this->state['name'],
            'email' => $this->state['email'],
            'password' => Hash::make($this->state['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
    public function render()
    {
        return view('pages.auth.register')->layout('components.templates.auth');
    }
}
