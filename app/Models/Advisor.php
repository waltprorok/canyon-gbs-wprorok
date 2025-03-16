<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Advisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];

    public function advisorCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'advisor_course',
            'advisor_id', 'course_id');
    }

}
