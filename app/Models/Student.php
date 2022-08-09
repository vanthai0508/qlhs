<?php

namespace App\Models;

 use App\Repositories\Eloquent\StudentRepository2;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RegisterRequest;

class Student extends Model
{
    use HasFactory;
    protected $table = 'tbl_hocsinh';
    protected $fillable = [
        
        'tenhocsinh',
        'sodienthoai'
        
    ];
    // public function list()
    // {
    //     $students=DB::select('SELECT * FROM tbl_hocsinh');
    //     return $students;
    // }
    // public function create(RegisterRequest $request)
    // {
    //     return DB::create($request->validate());
    // }



    
}

