<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeModel;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $list = EmployeeModel::paginate(5);
            return response()->json([
                "status"=>true,
                "code"=>Response::HTTP_OK,
                "data"=>$list
            ]);
        }catch(\Exception $e){
            return response()->json([
                "status"=>false,
                "code"=>Response::HTTP_INTERNAL_SERVER_ERROR,
                "message"=>$e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = [
            "name"=>"required",
            "email"=>"required",
            "designation"=>"required",
        ];
        $validator = Validator::make($request->all(),$check);
        if($validator->fails()){
            return response()->json($validator->errors(),Response::HTTP_BAD_REQUEST);
        }else{
            $createe = EmployeeModel::create($request->all());
            return response()->json([
                "message"=>"Create success",
                "status"=>true,
                "code"=>Response::HTTP_OK
            ]);
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
    public function update(Request $request,EmployeeModel $employee)
    {
        $employee->update($request->all());
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeModel $employee)
    {
        $employee->delete();
    }
}
