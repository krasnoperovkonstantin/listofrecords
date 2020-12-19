<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use App\Records;

class EditController extends Controller{

  public function submit(EditRequest $request){
   $records = new Records();
   $records->name = $request->input('name');
   $records->author = $request->input('author');
   $records->genre = $request->input('genre');
   $records->save();

   return redirect()->route ('records');
  }
    
}
