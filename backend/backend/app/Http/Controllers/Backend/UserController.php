<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

use App\User;
use App\Http\Requests\userRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->data['menu'] = 'user';
        $this->data['title'] = 'ผู้จัดการระบบ';
        $this->data['subtitle'] = '';
    }

    public function index()
    {
        $this->data['subtitle'] = 'ข้อมูลผู้จัดการระบบ';

        return view('user.index',['data' => $this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['subtitle'] = 'เพิ่มผู้ดูแลระบบ';

        $items = null;

        return view('user.form',['data' => $this->data,'items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {
        try{
            $model = User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => bcrypt($request->password)
                ]);

            session()->flash('success', 'success');

            return redirect('user');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            session()->flash('error', 'error');

            return back();  

        }
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = User::select('id','name','username','created_at');

        return Datatables::of($data)->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['subtitle'] = 'แก้ไขข้อมูลผู้ดูแลระบบ';

        $items = User::findOrfail($id);

        return view('user.form',['data'=>$this->data,'items'=>$items]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request, $id)
    {
        try{
            $model = User::where('id',$id)
                    ->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'password' => bcrypt($request->password)
                    ]);

            session()->flash('success', 'success');

            return redirect('user');
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            session()->flash('error', 'error');

            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $model = User::find($id);
            $model->delete();

            session()->flash('success', 'success');

            return back();
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            session()->flash('error', 'error');

            return back();  
        }
    }
}
