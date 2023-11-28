<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Image;

class ImageController extends Controller
{

    /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */
    public function store(Request $request)
    {
        
        $validator = Validator::make(request()->all(),[
            'name'  => 'required|string',
            'path' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|integer',
            'set_id' => 'required|exists:sets,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $image = Image::create($request->all());
        $image->save();

        return response()->json(['msg'=> 'Image created!', 'data'=> $image]);
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        $validator = Validator::make(request()->all(), [
            'name'  => 'string',
            'path' => 'string',
            'type' => 'string',
            'status' => 'integer',
            'set_id' => 'exists:sets,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        
        $image->update($request->all());
        return response()->json(['msg'=> 'Image updated!', 'data'=> $image]);
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return Response
        */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();
        return response()->json(['msg'=> 'Image deleted!']);
    }



    /**
        * Get the jsonified version of the resource
        *
        * @param  int  $id
        * @return Response
        */
        public function get($id){
            $image = Image::findOrFail($id);
            return $image->toJson();
        }

}
