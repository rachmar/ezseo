<?php

namespace App\Http\Livewire\Pages;

use App\Http\Livewire\Traits\WithToast;
use App\Http\Livewire\Traits\WithDrawer;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    use WithToast;
    use WithDrawer;

    protected $listeners = [
        'dashboardRefresh' => '$refresh',
        'dashboardDelete' => 'delete'
    ];

    public function create()
    {
        $this->openDrawer('forms.product-form');
    }

    public function confirm()
    {
        $this->openToast('confirm', [
            'dashboardDelete' => []
        ]);
    }

    public function delete()
    {   
        $this->openToast();
    }

    public function render()
    {
        return view('livewire.pages.dashboard');
    }
}
