<?php

namespace Domain\Services;

use App\Core\Services;
use Domain\Entities\Group;
use Exception;
use Illuminate\Support\Facades\DB;

class GroupService extends Services
{
    private Group $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function create($data)
    {
        $group = null;

        try {
            DB::beginTransaction();

            $group = $this->group->create($data);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception->getMessage());
        }

        return $group;
    }
}
