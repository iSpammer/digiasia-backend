<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Hrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\HrsResource;
class HrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $hrs = Hrs::latest()->paginate(5);
      
        // return view('hrs.index',compact('hrs'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);

        $hrs = Hrs::all();
        return response([ 'hrs' => HrsResource::collection($hrs), 'message' => 'Retrieved successfully'], 200);

    }

    // public function create()
    // {
    //     return view('hrs.create');
    // }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|max:255',
            'heartrate' => 'required',
            'xacc' => 'required',
            'yacc' => 'required',
            'zacc' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $hr = Hrs::create($data);

        $firestore = app('firebase.firestore')
                            ->database()
                            ->collection($hr->user_id)
                            ->newDocument();
         
        $firestore->set($data);

        return response(['hr' => new HrsResource($hr), 'message' => 'Created successfully'], 201);

    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrs  $hr
     * @return \Illuminate\Http\Response
     */
    public function show(Hrs $hr)
    {
        return response(['hr' => new HrsResource($hr), 'message' => 'Retrieved successfully'], 200);
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrs  $hr
     * @return \Illuminate\Http\Response
     */
    // public function edit(Hrs $hr)
    // {
    //     return view('hrs.edit',compact('hrs'));
    // }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrs  $hr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrs $hr)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required|max:255',
            'heartrate' => 'required',
            'xacc' => 'required',
            'yacc' => 'required',
            'zacc' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }


        $hr->update($request->all());
      
        return response(['hr' => new HrsResource($hr), 'message' => 'Update successfully'], 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrs  $hr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrs $hr)
    {
        $hr->delete();
       
        return response(['message' => 'Deleted']);
    }
/*
    public function indexCloud(Hrs $hr)
    {
        $data = app('firebase.firestore')
                    ->database()
                    ->collection($hr->user_id)
                    ->documents();
    
        if ($data->isEmpty()) {
            return collect();
        }
    
        $categories = collect($data->rows());
    
        return response([ 'hrs' => $categories, 'message' => 'Retrieved successfully'], 200);

    }
*/
}


