<?php

namespace App\Repositories;

use App\Models\Classrooms;
use App\Repositories\BaseRepository;

/**
 * Class ClassroomsRepository
 * @package App\Repositories
 * @version July 11, 2021, 11:41 am UTC
*/

class ClassroomsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'classroom_name',
        'classroom_code',
        'classroom_status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Classrooms::class;
    }
}
