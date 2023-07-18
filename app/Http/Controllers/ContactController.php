<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact; 


class ContactController extends Controller
{
    public readonly Contact $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }
    public function index()
    {   
        $users = $this->contact->all();
        return view('contact',['contact'=>$contact]);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' =>'required',
            'message' =>'required',
            'emaillist' =>'required',

        ]);
        $created = $this->contact->create([
            'subject' =>$request->input('subject'),
            'message' =>$request->input('message'),
            'emaillist' =>$request->input('emaillist')
    
          ]);
          if($created){
            return redirect('/')->with('message', 'cadastro concluido');
          }
          var_dump($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



}
