<?php

namespace App\Http\Livewire\Pages\Classrooms\Courses;

use App\Http\Livewire\Traits\WithToast;
use App\Http\Livewire\Traits\WithDrawer;
use App\Models\ClassroomCourse;
use Livewire\Component;

class CourseIndex extends Component
{
    use WithToast;
    use WithDrawer;

    protected $listeners = [
        'courseIndexRefresh' => '$refresh',
        'courseIndexDestroy' => 'destroy'
    ];

    public function render()
    {   
        $courses = ClassroomCourse::paginate();
        return view('livewire.pages.classrooms.courses.course-index', compact('courses'));
    }

    public function create()
    {
        $this->openDrawer('forms.classrooms.course-form', [
            'refreshEvent' => 'courseIndexRefresh',
        ]);
    }

    public function update(ClassroomCourse $course)
    {   
        $this->openDrawer('forms.classrooms.course-form', [
            'formData' => $course->toArray(),
            'refreshEvent' => 'courseIndexRefresh'
        ]);
    }

    public function confirm(ClassroomCourse $course)
    {
        $this->openDrawer('forms.classrooms.course-form', [
            'isConfirm' => true,
            'confirmEvents' => [
                'courseIndexDestroy' => $course->toArray()
            ]
        ]);
    }

    public function destroy($course)
    {   
        ClassroomCourse::findOrFail($course['id'])->delete();

        $this->emitSelf('courseIndexRefresh');

        $this->openToast('success');
    }
}
