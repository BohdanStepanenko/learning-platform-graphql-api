<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Data\Course\CreateCourseData;
use App\Models\Course;
use App\Services\Course\CreateCourseService;

class CourseMutation
{
    public function __construct(
        private CreateCourseService $createCourseService,
    ) {}

    public function create($_, array $args): Course
    {
        $data = new CreateCourseData(
            title: $args['title'],
            description: $args['description'] ?? null,
            level: $args['level'],
        );

        return $this->createCourseService->execute($data);
    }
}
