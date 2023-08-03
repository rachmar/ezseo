<?php

namespace App\Http\Livewire\Pages\Classrooms\Questionnaire;

use Livewire\Component;

class ViewQuestionnaire extends Component
{   
    public string $formattedTimer;

    public int $questionnaireTimer;

    public function mount(int $questionnaireTimer)
    {
        $this->questionnaireTimer = $questionnaireTimer;
    }

    public function render()
    {
        return view('livewire.pages.classrooms.questionnaire.view-questionnaire');
    }

    public function submit()
    {
        $this->emitTo('pages.classrooms.questionnaire.student-questionnaire', 'submitQuestionnaire');
    }
}
