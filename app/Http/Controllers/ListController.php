<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class ListController extends Controller
{
    public function index() 
    {
        $records = Record::all();
        return view('pages.index', [
            'records' => $records,
        ]);
    }
}
