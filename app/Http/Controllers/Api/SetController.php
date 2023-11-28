<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            'name'  => 'required|string',
            'description' => 'required|string',
            'instructions' => 'required|string',
            'status' => 'required|integer',
        ]);
        $set = Set::create($data);
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

        $data = $request->validate([
            'name'  => 'string',
            'description' => 'string',
            'instructions' => 'string',
            'status' => 'integer',
        ]);
        
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
        $set = Set::findOrFail($id);
        return $set->toJson();
    }
}
