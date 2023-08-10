<?php

namespace App\Http\Livewire\Pages\Companies;

use App\Http\Livewire\Traits\WithDrawer;
use App\Http\Livewire\Traits\WithToast;
use App\Models\Company;
use Livewire\Component;

class CompanyIndex extends Component
{   
    use WithToast, WithDrawer;

    protected $listeners = [
        'companyIndexRefresh' => '$refresh',
        'companyIndexDestroy' => 'destroy'
    ];

    public function render()
    {   
        $companies = Company::paginate();
        return view('livewire.pages.companies.company-index', compact('companies'));
    }

    public function create()
    {
        $this->openDrawer('panels.companies.company-panel');
    }

    public function update(Company $company)
    {   
        $this->openDrawer('panels.companies.company-panel', [
            'form' => $company->toArray()
        ]);
    }

    public function confirm(Company $company)
    {
        $this->openDrawer('panels.companies.company-panel', [
            'confirmEvents' => [
                'companyIndexDestroy' => $company->toArray()
            ]
        ]);
    }

    public function destroy($course)
    {   
        Company::findOrFail($course['id'])->delete();

        $this->emit('companyIndexRefresh');

        $this->openToast('success');
    }
}
