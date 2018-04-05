<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Status;
use App\Unit;
use App\Type;
use App\Conditions;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->data['menu'] = 'config';
        $this->data['title'] = 'ตั้งค่าพื้นฐานระบบ';
        $this->data['subtitle'] = '';
    }

    public function index()
    {
        $this->data['status'] = Status::all();
        $this->data['unit'] = Unit::all();
        $this->data['type'] = Type::all();
        $this->data['condition'] = Conditions::all();



        return view('config.index',['data'=>$this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $action = $request->action;

            if($action == 'status'){
                $model = new Status;
                $model->status_member_name = $request->status;
                $model->save();
            }

            session()->flash('success', 'success');

            return back();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $action = $request->action;

            if($action == 'status'){
                $model = Status::find($id);
                $model->status_member_name = $request->status;
                $model->save();
            }

            session()->flash('success', 'success');

            return back();

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
    public function destroy(Request $request, $id)
    {
        try{
            $action = $request->action;

            if($action == 'status'){
                $model = Status::find($id);
                $model->delete();
            }

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
