<?php

namespace App\Http\Controllers;

use App\Joueur;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $joueurs = Joueur::get();
        return view("joueurs.joueurs-index", compact('joueurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exentsion = $request->file('profile')->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $exentsion;
        $request->file('profile')->move(
            base_path() . '/public/upload/', $fileName
        );

        //  $request->profile->storeAs(public_path(), $fileName, 'uploads');


        // $request->profile->store(public_path().'/uploads',$fileName);

        $data = $request->input();
        $data['profile'] = $fileName;
        $joueur = Joueur::create($data);
        if ($joueur) {
            alert()->success('L\'enregistrement est effectué avec succès .', 'Opération réussie')->autoclose(2500);
            return redirect(route('joueurs.index'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $joueur = Joueur::findOrFail($id);
        return view("joueurs.joueurs-edit", compact('joueur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        unset($data['_token']);
        unset($data['_method']);
        if ($request->hasFile('profile')) {
            $exentsion = $request->file('profile')->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $exentsion;
            $request->file('profile')->move(
                base_path() . '/public/upload/', $fileName
            );
            $data['profile'] = $fileName;
        }



        $joueur = Joueur::where('id','=',$id)->update($data);
        if ($joueur) {
            alert()->success('La modification a été bien effectuée .', 'Opération réussie')->autoclose(2500);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $joueur = Joueur::findOrfail($id);
        if ($joueur) {
            Joueur::where('id', $joueur->id)->delete();
            //File::delete($joueur->profile);
            return response()->json(['id' => 1]);
        }
    }
}
