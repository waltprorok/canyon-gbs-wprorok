<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'bio',
        'date_of_birth'
    ];

    public function advisor(): HasOne
    {
        return $this->hasOne(Advisor::class);
    }

    public function advisors(): BelongsToMany
    {
        return $this->belongsToMany(Advisor::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'student_course',
        'student_id', 'course_id');
    }
}
