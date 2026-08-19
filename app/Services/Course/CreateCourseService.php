<?php

declare(strict_types=1);

namespace App\Services\Course;

use App\Data\Course\CreateCourseData;
use App\Models\Course;
use Illuminate\Support\Facades\Log;

class CreateCourseService
{
    public function execute(CreateCourseData $data): Course
    {
        $course = Course::create([
            'title' => $data->title,
            'description' => $data->description,
            'level' => $data->level,
        ]);

        Log::info('Course created', [
            'course_id' => $course->id,
            'title' => $course->title,
            'level' => $course->level,
        ]);

        return $course;
    }
}
