<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use App\Records;

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
        $records->save();
     
        return redirect()->route ('records')->with('success','добавлено');
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
        $records->save();
     
        return redirect()->route ('records')->with('success','обновлено');
    }

    public function deleteSubmit($id){
        Records::find($id)->delete();
     
        return redirect()->route ('records')->with('success','Удалено');
    }

    public function get(){
        $records = new Records();
        //dd($records->paginate(5));
        //return view('records', ['data'=> $records->where('name', '<>' , 'dwrwrwer')->get() ]);
        //return view('records', ['data'=> $records ]);
        return view('records', ['data' => $records->paginate(5)]);
    }
}

