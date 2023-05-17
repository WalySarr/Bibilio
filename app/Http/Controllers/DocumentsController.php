<?php

namespace App\Http\Controllers;

use App\Models\Docs;
use App\Models\Theme;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index(){
        return view('documents.show');
    }

    public function add(){
        $themes = Theme::all();
        return view('documents.create', compact('themes'));
    }

    public function create(Request $request){
        $request->validate([
            'titre' => 'required|min:3',
            'chemin' => 'required|mimes:pdf,txt',
            'theme_id' => 'required',

        ]);
        $data = $request->all();
        /** @var UploadedFile $imagePath */
        $imagePath = $data['chemin']->store('images', 'public');
        $data['chemin'] = $imagePath;
        Docs::create($data);
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
