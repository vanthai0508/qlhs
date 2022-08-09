<?php
    namespace App\Repositories\Eloquent;

    use App\Models\Student;
    use App\Repositories\EloquentRepository;


    class StudentRepository2 extends EloquentRepository
    {
        public function getModel()
        {
            return Student::class;
        }
    }
?>