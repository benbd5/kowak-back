<?php

namespace App\Repositories;

use App\Models\WorkSpace;

/**
 * Class WorkSpaceRepository
 * @package App\Repositories
 *
 * @method WorkSpace|null find($id)
 * @method WorkSpace findOrFail($id)
 */
class WorkSpaceRepository extends BaseRepository
{

    public function query()
    {
        return WorkSpace::query();
    }

}
