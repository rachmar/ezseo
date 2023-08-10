<?php

namespace App\Http\Livewire\Modules;

use Livewire\Component;

class Drawer extends Component
{   
    public string $panel;

    public array $options;

    public bool $isOpen = false;

    public bool $isConfirm = false;

    protected $listeners = [
        'showDrawer' => 'open', 
        'closeDrawer' => 'close'
    ];

    protected function options($options)
    {
        $options['form'] = $options['form'] ?? [];

        $this->isConfirm = (isset($options['confirmEvents']) && count($options['confirmEvents']) > 0 ) ? true : false;

        return $options;
    }

    public function open(string $panel, array $options)
    {   
        $this->panel = $panel;   

        $this->isOpen = true;

        $this->options = $this->options($options); 
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
