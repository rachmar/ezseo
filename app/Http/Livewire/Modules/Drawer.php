<?php

namespace App\Http\Livewire\Modules;

use Livewire\Component;

class Drawer extends Component
{   
    public string $form;

    public array $options;

    public bool $isOpen = false;

    public bool $isConfirm = false;

    protected $listeners = [
        'showDrawer' => 'open', 
        'closeDrawer' => 'close'
    ];

    public function open(string $form, array $options)
    {   
        $this->form = $form;   

        $this->isOpen = true;

        $this->options = $options; 

        $this->isConfirm = $options['isConfirm'] ?? false ;
    }

    public function confirm()
    {   
        $this->close();

        $noConfirmEvent = true;
        foreach ($this->options['confirmEvents'] as $eventName => $eventData) 
        {
            $this->emit($eventName, $eventData);
            $noConfirmEvent = false;
        }

        if ($noConfirmEvent) {
            throw new \Exception('No confirm event has been executed, Kindly check the confirmEvents parameter.');
        }
    }

    public function close()
    {   
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.modules.drawer');
    }
}
