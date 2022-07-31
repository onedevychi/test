<?php

namespace App\Http\Controllers\Country;

use App\Models\MessagesModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator; 

class MessagesController extends Controller
{
    public function messages()
    {
        return response()->json(MessagesModel::get(), 200);
    }

    public function messagesById($id)
    {
        $message = MessagesModel::find($id);
        if(is_null($message)){
            return response()->json(['error' => true, 'message' => 'Not found'], 200);
        }
        return response()->json(MessagesModel::find($id), 200);
    }

    public function messagesSave(Request $req)
    {
        $rules = [
            'message' => 'required|min:10|max:300',
            'user_id' => 'required'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $messages = MessagesModel::create($req->all());
        return response()->json($messages, 201);
    }

    public function messagesEdit(Request $req, $id)
    {
        $rules = [
            'message' => 'required|min:10|max:300'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $message = MessagesModel::find($id);
        if(is_null($message)){
            return response()->json(['error' => true, 'message' => 'Not found'], 200);
        }
        $message->update($req->all());
        return response()->json($message, 200);
    }

    public function messagesDelete(Request $req, $id)
    {
        $message = MessagesModel::find($id);
        if(is_null($message)){
            return response()->json(['error' => true, 'message' => 'Not found'], 200);
        }
        $message->delete();
        return response()->json('', 204);
    }
}
