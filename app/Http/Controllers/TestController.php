<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolled_subject;
use App\Subject;
use App\Student;
use Response;
use DB;


class TestController extends Controller
{
    public function index() {
        $subjects = Subject::all();

        return $subjects;
    }
}
