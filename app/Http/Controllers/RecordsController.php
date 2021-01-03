<?php

namespace listofrecords\Http\Controllers;

use Illuminate\Http\Request;
use listofrecords\Http\Requests\EditRequest;
use listofrecords\Records;

class RecordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert(){
        return view('insert');
    }
    
    public function insertSubmit(EditRequest $request){
        $records = new Records();
        $records->name = $request->input('name');
        $records->author = $request->input('author');
        $records->genre = $request->input('genre');
        $records->listoftracks = $request->input('listoftracks');
        $records->save();
     
        return redirect()->route ('records')->with('success','Пластинка добавлена');
    }

    public function update($id){
        $records = new Records();
        return view('update', ['data'=> $records->find($id) ]);
  
    }

    public function updateSubmit($id, EditRequest $request){
        $records = Records::find($id);
        $records->name = $request->input('name');
        $records->author = $request->input('author');
        $records->genre = $request->input('genre');
        $records->listoftracks = $request->input('listoftracks');
        $records->save();
     
        return redirect()->route ('records')->with('success','Изменения сохранены');
    }

    public function deleteSubmit($id){
        Records::find($id)->delete();
     
        return redirect()->route ('records')->with('success','Пластинка удалена');
    }

    public function get(){
        $records = new Records();
        //dd($records->paginate(5));
        //return view('records', ['data'=> $records->where('name', '<>' , 'dwrwrwer')->get() ]);
        //return view('records', ['data'=> $records ]);
        return view('records', ['data' => $records->paginate(5)]);
    }
}

