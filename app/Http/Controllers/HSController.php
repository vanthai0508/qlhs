<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\StudentRepository;
use Illuminate\Cache\Repository;
use App\Http\Requests\RegisterRequest;
//use App\Student;

class HSController extends Controller
{
    protected $student;
    public function __construct(StudentRepository $student)
    {
        $this->student=$student;
    }

    public function show()
    {
        $students=$this->student->list();
        return view('hocsinh.list',['listhocsinh'=>$students]);
    }

    // public function createNew(RegisterRequest $request)
    // {
    //     $student=$this->student->create();
    // }
    public function create(Request $request)
    {
       $this->student->create($request);
        return redirect('hocsinh/create');
    }

    public function find($id)
    {
        $studenEdit=$this->student->find($id);
        return view('hocsinh.edit',['getHocSinhById'=>$studenEdit]);
    }
    
}
