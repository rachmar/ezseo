<?php

namespace App\Http\Livewire\Panels\Companies;

use App\Http\Livewire\Traits\WithDrawer;
use App\Http\Livewire\Traits\WithToast;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyPanel extends Component
{
    use WithToast, WithDrawer;

    public string $title;

    public array $form = [];

    public function rules()
    {
        return (new Company())->validationRules();
    }

    public function mount(array $options)
    {   
        $this->form = $options['form'];
    }

    public function render()
    {   
        return view('livewire.panels.companies.company-panel');
    }

    public function submit()
    {   
        $validated = $this->validate()['form'];
        
        $validated['owner_id'] = Auth::id();
        
        Company::updateOrCreate(
            [ 'id' => $this->form['id'] ?? null],
            $validated
        );

        $this->closeDrawer();
        
        $this->openToast('success');

        $this->emit('companyIndexRefresh');
    }
}
