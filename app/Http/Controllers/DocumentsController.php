<?php

namespace App\Http\Controllers;

use App\Models\Docs;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index(){
        return view('documents.index');
    }

    public function show(){
        return view('documents.create');
    }

    public function create(Request $request){
        Docs::create($request->all());
        return redirect()->back()->with('addSuccess', 'Le document a été ajouté avec succés');
    }
}
