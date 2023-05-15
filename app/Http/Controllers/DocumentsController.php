<?php

namespace App\Http\Controllers;

use App\Models\Docs;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index(){
        return view('documents.show');
    }

    public function add(){
        return view('documents.create');
    }

    public function create(Request $request){
        Docs::create($request->all());
        return redirect()->back()->with('addSuccess', 'Le document a été ajouté avec succés');
    }

    public function show(){
        $docs = Docs::all();
        return view('documents.show', compact('docs'));
    }

    public function consult($id){
        $doc = Docs::find($id);
        return view('documents.consult', compact('doc'));
    }

    public function delete($id){
        $doc = Docs::find($id);
        $doc->delete();
        return redirect()->back()->with('deleteSuccess', 'Le document a été supprimé avec succés');
    }

    public function edit($id){
        $doc = Docs::find($id);
        return view('documents.edit', compact('doc'));
    }

    public function update(Request $request, $id){
        $doc = Docs::find($id);
        $doc->update($request->all());
        return to_route('documents.show')->with('updateSuccess', 'Le document a été mis à jour avec succés');
    }
}
