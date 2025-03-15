<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

//    public $students;

    public function render()
    {
//        $this->students = Student::all();

        return view('livewire.students', [
            'students' => Student::paginate(5)->withQueryString(),
        ])->layout('layouts.app');
    }
}
