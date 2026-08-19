<?php

declare(strict_types=1);

namespace App\Data\Course;

final readonly class CreateCourseData
{
    public function __construct(
        public string $title,
        public ?string $description,
        public string $level,
    ) {}
}
