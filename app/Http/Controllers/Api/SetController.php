<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Set;

class SetController extends Controller
{

    /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name'  => 'required|string',
            'description' => 'required|string',
            'instructions' => 'required|string',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $set = Set::create($request->all());
        $set->save();
        return response()->json(['msg'=> 'Set created!', 'data'=> $set]);
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function update(Request $request, $id)
    {
        $set = Set::findOrFail($id);

        $validator = Validator::make(request()->all(),[
            'name'  => 'string',
            'description' => 'string',
            'instructions' => 'string',
            'status' => 'integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        $set->update($data);
        return response()->json(['msg'=> 'Set updated!', 'data'=> $set]);
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function destroy($id)
    {
        $set = Set::findOrFail($id);
        $set->delete();
        return response()->json(['msg'=> 'Set deleted']);
    }

    /**
        * Get the jsonified version of the resource
        *
        * @param  int  $id
        * @return Response
        */
    public function get($id){
        $set = Set::with('images', 'results')->findOrFail($id);
        return $set->toJson();
    }
}
