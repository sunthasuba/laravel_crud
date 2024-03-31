<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\StudentService;

class StudentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'student';
    }
}
