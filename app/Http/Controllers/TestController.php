<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TestDataModel;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;


class TestController extends Controller
{
    public function addItem(Request $request){
        $rules = array(
              'name' => 'required',
              'surname' => 'required',
              'phone' => 'required|numeric',
              'age' => 'required|numeric',
              'email' => 'nullable',
        );
      /*$rules = array(
              'name' => 'required|alpha_num',
              'surname' => 'required|alpha_num',
              'phone' => 'required|numeric|max:11',
              'age' => 'required|numeric|max:3|min:1',
              'email' => '',
      );
      $messages = [
        'required' => 'The :attribute field is required.',
        'min'    => 'The :attribute must be at last :min number ',
        'max' => 'The :attribute must be smaler or equal to :max numbers',
    ];*/
        $validator = Validator::make(Input::all(), $rules/*, $messages*/);
        if ($validator->fails()) {
            return Response::json(array(
              'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new TestDataModel();
            $data->name = $request->name;
            $data->surname = $request->surname;
            $data->phone = $request->phone;
            $data->age = $request->age;
            $data->email = $request->email;
            $data->save();
            return response()->json($data);
        }
    }
    public function readItems(Request $request){
        $data = TestDataModel::all();
        return view('welcome')->withData($data);
    }
    public function editItem(Request $request){
        $data = TestDataModel::find($request->id);
        $data->name = $request->name;
        $data->surname = $request->surname;
        $data->phone = $request->phone;
        $data->age = $request->age;
        $data->email = $request->email;
        $data->save();
        return response()->json($data);
    }
    public function deleteItem(Request $request){
        TestDataModel::find($request->id)->delete();
        return response()->json();
    }
}
