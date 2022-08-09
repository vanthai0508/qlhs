<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\StudentRepository2;
use Illuminate\Http\Request;

use Illuminate\Cache\Repository;
use App\Http\Requests\RegisterRequest;
//use App\Student;

class HSController extends Controller
{
    protected $student;
    public function __construct(StudentRepository2 $student)
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
        if($this->student->find($id))
        {
            echo "hdsa";
        }
        else "thatbai";
        return view('hocsinh.edit')->with('getHocSinhById',$studenEdit);
    }
    public function update(Request $request)
    {
        $id=$request->id;
        $create = $this->student->update($request,$id);
        if($create)
        {
            $students=$this->student->list();
       // return view('hocsinh.list',['listhocsinh'=>$students]);
            return view('hocsinh.list')->with('listhocsinh',$students);
        }
        else
            echo "loi roi";
    }
    
}
