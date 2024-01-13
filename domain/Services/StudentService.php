<?php

namespace Domain\Services;

use App\Core\Services;
use Domain\Entities\Student;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentService extends Services
{
    private Student $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function create($data)
    {
        $student = null;
        try {
            DB::beginTransaction();

            $student = $this->student->create($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception->getMessage());
        }

        return $student;
    }
}
