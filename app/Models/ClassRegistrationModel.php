<?php

namespace App\Models;

class ClassRegistrationModel extends \CodeIgniter\Model
{
    protected $table = 'class_registration';

    protected $allowedFields = ['class', 'class_description', 'number_of_students', 'user_id'];

    protected $returnType = 'App\Entities\ClassRegistration';

    protected $useTimestamps = true;

    protected $validationRules = [
        'class' => 'required',
        'class_description' => 'required',
        'number_of_students' => 'required',
    ];

    protected $validationMessages = [
        'class' => [
            'required' => 'ClassRegistration.class.required',
        ],
        'class_description' => [
            'required' => 'ClassRegistration.class_description.required',
        ],
        'count' => [
            'required' => 'ClassRegistration.count.required',
        ]
    ];

    public function paginateClassRegistrationsByUserId($id)
    {
        return $this->where('user_id', $id)
                    ->orderBy('created_at')
                    ->paginate(10);
    }

    public function paginateClassRegistrations()
    {
        return $this->limit()
                    ->groupBy('class')
                    ->orderBy('class', 'DESC')
                    ->paginate(10);
                    //->paginate(10);
    }

    public function getClassRegistrationByUserId($id, $user_id)
    {
        return $this->where('id', $id)
                    ->where('user_id', $user_id)
                    ->first();
    }

    public function getSumOfStudentsByUserID($user_id){
      $registrations=$this->where('user_id', $user_id)
                            ->get()->getResult();

      $reg= array_column($registrations, 'number_of_students');
    //  $key='number_of_students';
    //  $sum = array_sum(array_column($registrations,$key));

                  return array_sum($reg);
    }

    

    public function search($term, $user_id)
    {
        if ($term === null) {

            return [];
        }

        return $this->select('id, description')
                    ->where('user_id', $user_id)
                    ->like('description', $term)
                    ->get()
                    ->getResultArray();
    }
}
