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
            'type' => 'required|string',
            'status' => 'required|integer',
            'set_id' => 'required|exists:sets,id',
            // TODO: COMMENTED FOR PROJECT SUBMISSION ONLY 'image_data' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        //store the image
        // try{
        //     $image_data = base64_decode($request->input('image_data'));
        //     $image_name = time() . '_uploaded_image.' . $request->input('type');
        //     file_put_contents(public_path('images/' . $image_name), $image_data);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 422);
        // }
        //NOTE: THE ABOVE WAS COMMENTED FOR SUBMISSION ONLY, IT WORKS AND WILL BE USEFUL IF YOU CONTINUE THIS APP
        

        $image = Image::create($request->all());
        $image->path = '/images/' . $image_name;
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
            'status' => 'integer',
            'set_id' => 'exists:sets,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $data = $validator->validated();
        $image->update($data);
        $image->save();
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
            $image = Image::with('results')->findOrFail($id);
            return $image->toJson();
        }

}
