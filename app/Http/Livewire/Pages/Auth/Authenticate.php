<?php

namespace App\Http\Livewire\Pages\Auth;

use App\Providers\RouteServiceProvider;
use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Authenticate extends Component
{   
    public string $email;
    public string $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function render()
    {   
        return view('livewire.pages.auth.login')->layout('layouts.guest');
    }

    public function updated()
    {
        $this->validate();
    }

    public function submit()
    {   
        $validated = $this->validate();

        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        request()->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy()
    {   
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('login');
    }
}
