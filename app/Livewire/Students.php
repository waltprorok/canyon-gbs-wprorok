<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public $students;

    public function render()
    {
        $this->students = Student::all();

        return view('livewire.students', $this->students)
            ->layout('layouts.app');
    }
}
