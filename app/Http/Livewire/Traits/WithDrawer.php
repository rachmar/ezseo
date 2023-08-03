<?php

namespace App\Http\Livewire\Traits;

trait WithDrawer
{
    protected function openDrawer(string $form, array $options)
    {   
        $this->emitTo('modules.drawer', 'showDrawer', $form, $options);
    }

    protected function closeDrawer()
    {
        $this->emitTo('modules.drawer', 'closeDrawer');
    }
}