<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function advisor(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function student(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_course',
            'student_id', 'course_id');
    }
}
