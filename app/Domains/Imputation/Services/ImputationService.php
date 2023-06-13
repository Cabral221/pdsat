<?php

namespace App\Domains\Imputation\Services;

use App\Services\BaseService;
use App\Domains\Imputation\Models\Imputation;

/**
 * Class AnnouncementService.
 */
class ImputationService extends BaseService
{
    /**
     * ImputationService constructor.
     *
     * @param  Imputation  $Imputation
     */
    public function __construct(Imputation $imputation)
    {
        $this->model = $imputation;
    }

    public function create(Array $imputation)
    {
        return $this->model::create($imputation);
    }

    public function find(int $id)
    {
        return $this->model::find($id);
    }

    public function delete(Imputation $imputation)
    {
        return $imputation->delete();
    }


}
