<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index(){
        return view('documents.index');
    }

    public function create(){
        return view('documents.create');
    }
}
