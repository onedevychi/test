<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Concat;

class ContactController extends Controller
{
    public function submit(ContactRequest $req){
        $contact = new Contact();
        $user = auth()->user();
        $contact->name = $user->name;
        $contact->message = $req->input('message');
        $contact->user_id = $user->id;
        $contact->save();

        //return "окей";
        return redirect()->route('admin-update');
    }

    public function allData(){
        $contact = new Contact;
        return view('travel_list', ['data' => $contact->orderBy('id', 'desc')->paginate(20)]);
        //return view('travel_list', ['data' => $contact->orderBy('id', 'desc')->skip(1)->take(20)->get()]);
        //dd(Contact::all());
        //return view('travel_list', ['data' => $contact->orderBy('id', 'desc')->skip(1)->take(20)->get()]);
    }

    public function allDataAdmin(){
        $contact = new Contact;
        return view('view', ['data' => $contact->orderBy('id', 'desc')->paginate(20)]);
    }

    public function showOneMessage($id){
        $contact = new Contact;
        return view('one-view', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id){
        $contact = new Contact;
        return view('admin-update-one', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req){
        $contact = Contact::find($id);
        //$this->authorize('update', $id);
        $contact->message = $req->input('message');
        
        $contact->save();

        //return "окей";
        return redirect()->route('admin');
    }

    public function deleteMessage($id){
        Contact::find($id)->delete();
        return redirect()->route('admin');
    }
   // public function updateMessage($id){
   //     $contact = new Contact;
   //     return view('admin-update', ['data' => $contact->find($id)]);
   // }
}
