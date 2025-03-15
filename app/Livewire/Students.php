<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;


    public function render()
    {
        return view('livewire.students', [
            'students' => Student::paginate(5),
        ])->layout('layouts.app');
    }
}
