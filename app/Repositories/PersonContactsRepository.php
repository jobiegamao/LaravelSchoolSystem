<?php

namespace App\Repositories;

use App\Models\PersonContacts;
use App\Repositories\BaseRepository;

/**
 * Class PersonContactsRepository
 * @package App\Repositories
 * @version July 11, 2021, 8:30 am UTC
*/

class PersonContactsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'person_id',
        'contact_no',
        'email',
        'permanent_address',
        'current_address',
        'emergencyContactName',
        'emergencyContactNo'
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
        return PersonContacts::class;
    }
}
