<?php

namespace Domain\Services;

use App\Core\Services;
use Domain\Entities\Teacher;
use Exception;
use Illuminate\Support\Facades\DB;

class TeacherService extends Services
{
    private Teacher $teacher;

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function create($data)
    {

        $teacher = null;
        try {
            DB::beginTransaction();

            $teacher = $this->teacher->create($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception->getMessage());
        }

        return $teacher;
    }
}
