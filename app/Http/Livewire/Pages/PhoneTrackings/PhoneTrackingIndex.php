<?php

namespace App\Http\Livewire\Pages\PhoneTrackings;

use App\Models\Company;
use Illuminate\Http\Request;
use Livewire\Component;

class PhoneTrackingIndex extends Component
{   
    public int $selectedCompany = 0;

    protected $listeners = [
        'phoneTrackingIndexRefresh' => '$refresh',
    ];

    public function mount(Request $request)
    {
        // dd($request->all());
    }
    
    public function render()
    {   
        $companies = Company::paginate();
        
        $phoneNumbers = Company::where('id', $this->selectedCompany)->first();

        return view('livewire.pages.phone-trackings.phone-tracking-index', compact('companies', 'phoneNumbers'));
    }
}
