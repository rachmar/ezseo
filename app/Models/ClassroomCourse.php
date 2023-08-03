<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ClassroomCourse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'instructor_id', 
        'term_id', 
        'semester_id',
        'division_id',
        'access_token',
        'name', 
        'description',
    ];

    public function rules()
    {
        return [
            'formData.term_id' => ['required', 'integer', 'exists:classroom_terms,id'],
            'formData.semester_id' => ['required', 'integer', 'exists:classroom_semesters,id'],
            'formData.division_id' => ['required', 'integer', 'exists:classroom_divisions,id'],
            'formData.name' => ['required', 'string'],
            'formData.description' => ['required', 'string'],
        ];
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function term()
    {
        return $this->belongsTo(ClassroomTerm::class, 'term_id');
    }

    public function semester()
    {
        return $this->belongsTo(ClassroomSemester::class, 'semester_id');
    }

    public function division()
    {
        return $this->belongsTo(ClassroomDivision::class, 'division_id');
    }

}
