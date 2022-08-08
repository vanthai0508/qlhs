<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class HocsinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData=DB::table('tbl_hocsinh')->select('id','tenhocsinh','sodienthoai')->get();

        return view('hocsinh.list')->with('listhocsinh',$getData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hocsinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $allRequest=$request->all();
        $tenhocsinh=$allRequest['tenhocsinh'];
        $sodienthoai=$allRequest['sodienthoai'];

        $dataInsertToDatabase=array('tenhocsinh'=>$tenhocsinh,'sodienthoai'=>$sodienthoai,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H-i-s'));

        $insertData=DB::table('tbl_hocsinh')->insert($dataInsertToDatabase);

        if($insertData)
        {
           Session::flash('success','them moi hoc sinh thanh cong');

        }
        else
        {
            Session::flash('error','them that bai');
        }

        return redirect('hocsinh/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getData=DB::table('tbl_hocsinh')->select('id','tenhocsinh','sodienthoai')->where('id',$id)->get();
        return view('hocsinh.edit')->with('getHocSinhById',$getData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $updateData=DB::table('tbl_hocsinh')->where('id',$request->id)->update(['tenhocsinh'=>$request->tenhocsinh,'sodienthoai'=>$request->sodienthoai,'updated_at'=>date('Y-m-d H:i:s')]);

        if($updateData)
        {
            Session::flash('success','sua hoc sinh thanh cong');

        }
        else
        {
            Session::flash('error','sua that bai');
        }

        return redirect('hocsinh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData=DB::table('tbl_hocsinh')->where('id','=',$id)->delete();

        if($deleteData  )
        {
            Session::flash('success','xoa hoc sinh thanh cong');

        }
        else
        {
            Session::flash('error','xoa that bai');
        }

        return redirect();
    }
}
