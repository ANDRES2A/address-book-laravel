<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;

class contacts extends Controller
{
    //
    public function store(Request $request){
      //$last=\App\contact::select('id')->orderBy('id', 'desc')->first();
      $mensaje=new contact;
      //$mensaje->id = $last++;
      $mensaje->firstName = $request->firstName;
      $mensaje->lastName = $request->lastName;
      $mensaje->phone = $request->phone;
      $mensaje-> save();
      //return view('welcome');
    }
    public function getContacts(){
      return $contacts=\App\contact::select('*')->get();
    }

    public function getAddressBook(){
      $contacts=\App\contact::select('*')->get();
      return view('addressBook', array('contacts' => \App\contact::select('*')->get()));
    }

    public function deleteContactById(Request $request)
    {
      \App\contact::where('_id', $request->id)->delete();
    }
}
