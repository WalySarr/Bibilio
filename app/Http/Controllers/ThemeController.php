<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ThemeController extends Controller
{
    function show(){
        return view('themes.theme');
    }
    
    function addTheme(Request $request){
         try {
            $request->validate([
            'theme' => [
                'required',
                Rule::unique('themes')->where(function ($query) use ($request) {
                    return $query->where('niveau', $request->niveau);
                }),
            ],
            'niveau' => 'required',
        ], [
            'theme.required' => 'Le champ titre est obligatoire',
            'theme.unique' => 'Ce couple (thème, niveau) existe déjà',
            'niveau.required' => 'Le champ niveau est obligatoire',
        ]);

        Theme::create($request->all());
        return redirect()->back()->with('success', 'Le Theme a été ajouté avec succès');
        
         } catch (QueryException $query) {
        return redirect()->back()->withErrors(['exception' => 'Ce couple (thème, niveau) existe déjà.']);

         }
    }
    

 
    function catalog(){
        $themes = Theme::all();
        return view('themes.catalog', compact('themes'));
    }
    function consult($id){
        $theme = Theme::find($id);
        return view('themes.consult', compact('theme'));
    }

    function delete($id){
        $themes = Theme::find($id);
        $themes->delete();
        return redirect()->back();

    }

    function edit($id){
        $theme = Theme::find($id);
        return view('themes.edit', compact('theme'));
    }

    function update(Request $request, $id){
        try {
            $request->validate([
            'theme' => [
                'required',
                Rule::unique('themes')->where(function ($query) use ($request) {
                    return $query->where('niveau', $request->niveau);
                }),
            ],
            'niveau' => 'required',
        ], [
            'theme.required' => 'Le champ titre est obligatoire',
            'theme.unique' => 'Ce couple (thème, niveau) existe déjà',
            'niveau.required' => 'Le champ niveau est obligatoire',
        ]);
        $theme = Theme::find($id);
        $theme->update($request->all());
        return redirect('/catalog')->with('updateSuccess', 'Le Theme a été Modifié avec succès');
        
         } catch (QueryException $query) {
        return redirect('/themes/{id}/edit')->withErrors(['exception' => 'Ce couple (thème, niveau) existe déjà.']);

         }
    }
}