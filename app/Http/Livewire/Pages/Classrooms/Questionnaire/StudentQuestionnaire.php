<?php

namespace App\Http\Livewire\Pages\Classrooms\Questionnaire;

use Livewire\Component;

class StudentQuestionnaire extends Component
{   
    public int $questionnaireTimer;

    public int $currentQuestionIndex;

    public array $questionnaire = [];

    protected $listeners = [
        'submitQuestionnaire'
    ];

    public function mount()
    {   
        $this->currentQuestionIndex = 0;
        $this->questionnaireTimer = 100;
        $this->questionnaire = json_decode('[ { "id": 1, "question": "I apologize for the confusion in my previous responses. It appears that there was a misunderstanding in the provided code. To implement the \"Next\" and \"Finish\" buttons correctly", "choices": [ { "id": 1, "name": "Option A" }, { "id": 2, "name": "Option B" }, { "id": 3, "name": "Option C" }, { "id": 4, "name": "Option D" }], "type": "MULTIPLE_CHOICE", "answer": null }, { "id": 2, "question": "I apologize for the confusion in my previous responses. It appears that there was a misunderstanding in the provided code. To implement the \"Next\" and \"Finish\" buttons correctly", "choices": [ { "id": 5, "name": "True" }, { "id": 6, "name": "False" }], "type": "TRUE_OR_FALSE", "answer": null }, { "id": 3, "question": "I apologize for the confusion in my previous responses. It appears that there was a misunderstanding in the provided code. To implement the \"Next\" and \"Finish\" buttons correctly", "type": "ESSAY", "answer": null }, { "id": 4, "question": "I apologize for the confusion in my previous responses. It appears that there was a misunderstanding in the provided code. To implement the \"Next\" and \"Finish\" buttons correctly", "choices": [ { "id": 99, "name": "Agostos" }, { "id": 11, "name": "aTesting" }], "type": "IDENTIFICATION", "answer": null }, { "id": 5, "question": "I apologize for the confusion in my previous responses. It appears that there was a misunderstanding in the provided code. To implement the \"Next\" and \"Finish\" buttons correctly", "choices": [ { "id": 7, "name": "Option A" }, { "id": 8, "name": "Option B" }, { "id": 9, "name": "Option C" }, { "id": 10, "name": "Option D" }], "type": "ENUMERATION", "answer": null }, { "id": 6, "question": "I apologize for the confusion in my previous responses. It appears that there was a misunderstanding in the provided code. To implement the \"Next\" and \"Finish\" buttons correctly", "choices": [ { "id": 11, "name": "Animals" }, { "id": 12, "name": "Shapes" }], "matches": [ { "id": 1, "name": "Dogs" }, { "id": 2, "name": "Circle" }, { "id": 3, "name": "Wrong Answer" }], "type": "MATCHING_TYPE", "answer": null }]', true);
    }

    public function render()
    {   
        $questionNumber = $this->questionNumber();

        $currQuestion = $this->questionnaire[$this->currentQuestionIndex];


        return view('livewire.pages.classrooms.questionnaire.student-questionnaire', compact('currQuestion', 'questionNumber'))->layout('layouts.questionnaire');
    }

    public function submitQuestionnaire()
    {
        dd($this->questionnaire);
    }

    public function nextQuestion()
    {   
        $this->currentQuestionIndex++;
    }

    private function questionNumber()
    {
        return "Question ".($this->currentQuestionIndex + 1)." of ".(count($this->questionnaire) - 1);
    }
}
