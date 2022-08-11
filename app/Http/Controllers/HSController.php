<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\StudentRepository2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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

    public function createView()
    {
        return view('hocsinh.create');
    }
    public function create(Request $request)
    {
        if( $this->student->create($request))
        {
            return redirect('hocsinh/list');
        }
        
    }

    public function find($id)
    {
        $studenEdit = $this->student->find($id);
        if($this->student->find($id))
        {
            echo "tim thanh cong";
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
        //    $students=$this->student->list();
       // return view('hocsinh.list',['listhocsinh'=>$students]);
            return redirect('hocsinh/list');
        }
        else
            echo "loi roi";
    }

    public function delete($id)
    {
        if($this->student->delete($id))
        {
            Session::flash('success','xoa hoc sinh thanh cong');
        }
        else Session::flash('error','xoa hoc sinh that bai');

        return redirect('hocsinh/list');
    }
    public function loginView()
    {
        return view('hocsinh.login');
    }

    public function login(LoginRequest $request)
    {
        // $users=User::get();

        // echo $users;
        $username = $request->username;
        $password = $request->password;
        // {
            dd(Auth::attempt(['name' => $username, 'password' => $password]));
        // if( (Auth) ==true)
        // {
        //     return redirect('user/create');
        // }
        // else
        // {
        //     return redirect()->back()->with('status', 'Username hoac Password khong dung'.$request->password);
            
        // }
    }
    
}
