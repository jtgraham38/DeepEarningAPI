<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Result;

class ResultController extends Controller
{

    /**
        * Store a newly created resource in storage.
        *
        * @return Response
        */

        public function store(Request $request)
        {
            
            $validator = Validator::make(request()->all(),[
                'top'  => 'required|integer',
                'left'  => 'required|integer',
                'bottom'  => 'required|integer',
                'right'  => 'required|integer',
                'angle' => 'string',
                'distance' => 'string',
                'subject' => 'string',
                'clarity' => 'string',
                'obscured' => 'string',
                'orientation' => 'string',
                'image_id' => 'required|exists:images,id'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
            $result = Result::create($request->all());
            $result->save();
    
            return response()->json(['msg'=> 'Result created!', 'data'=> $result]);
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update(Request $request, $id)
        {
            $result = Result::findOrFail($id);
    
            $validator = Validator::make(request()->all(), [
                'top'  => 'integer',
                'left'  => 'integer',
                'bottom'  => 'integer',
                'right'  => 'integer',
                'angle' => 'string',
                'distance' => 'string',
                'subject' => 'string',
                'clarity' => 'string',
                'obscured' => 'string',
                'orientation' => 'string',
                'image_id' => 'exists:images,id'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 422);
            }
            $data = $validator->validated();
            $result->update($data);
            $result->save();
            return response()->json(['msg'=> 'Result updated!', 'data'=> $result]);
        }
    
        /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function destroy($id)
        {
            $result = Result::findOrFail($id);
            $result->delete();
            return response()->json(['msg'=> 'Result deleted!']);
        }

    /**
        * Get the jsonified version of the resource
        *
        * @param  int  $id
        * @return Response
        */
        public function get($id){
            $result = Result::findOrFail($id);
            return $result->toJson();
        }
}
