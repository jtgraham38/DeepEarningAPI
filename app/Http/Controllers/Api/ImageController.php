<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            'name'  => 'required|string',
            'path' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|integer',
            'set_id' => 'required|exists:users,id'
        ]);
        $image = Image::create($data);
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

        $data = $request->validate([
            'name'  => 'string',
            'path' => 'string',
            'type' => 'string',
            'status' => 'integer',
            'set_id' => 'exists:users,id'
        ]);
        
        $image->update($data);
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
        return $image->delete();
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
