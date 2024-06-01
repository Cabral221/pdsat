<?php

namespace App\Domains\Mission\Services;

use App\Services\BaseService;
use App\Domains\Mission\Models\Mission;

/**
 * Class MissionService.
 */
class MissionService extends BaseService
{
    /**
     * MissionService constructor.
     *
     * @param  Mission  $mission
     */
    public function __construct(Mission $mission)
    {
        $this->model = $mission;
    }

    public function all()
    {
        return $this->model::orderBy('validation', 'ASC')
                            ->orderBy('status', 'ASC')
                            ->orderBy('created_at', 'DESC');
    }

    public function create(Array $mission)
    {
        return $this->model::create($mission);
    }

    public function find(int $id)
    {
        return $this->model::find($id);
    }

    public function delete(Mission $mission)
    {
        return $mission->delete();
    }

    public function active()
    {
        return Mission::active()->orderBy('created_at', 'DESC')->paginate(10);
    }

}
