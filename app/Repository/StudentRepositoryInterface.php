<?php

namespace App\Repository;

interface StudentRepositoryInterface
{

        // Get Add Form Student
        public function Create_Student();

        //Store_Student
        public function Store_Student($request);

}
