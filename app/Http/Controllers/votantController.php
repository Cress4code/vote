<?php

namespace App\Http\Controllers;

use App\Dailyvotes;
use App\Joueur;
use App\Votant;
use Illuminate\Http\Request;

class votantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votants = Votant::get();
        return view('votants.votants-index', compact('votants'));
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

        $formdata = (object)$request->formData;
        // echo json_encode($formdata);
        // dd();
        switch ($formdata->todo) {
            case "check":
                $votant = Votant::getVotantByEmail($formdata->email);

                if (isset($votant->id)) {


                    $dailyvotes = Dailyvotes::yetVoted($votant->id);
                    //echo json_encode($dailyvotes);
                    if ($dailyvotes->joueurId == $formdata->joueurId) {
                        echo json_encode(["todo" => "delete", "votantId" => $dailyvotes->votantId,]);
                    } else {
                        echo json_encode([
                            "todo" => "update",
                            "lastjoueur" => $dailyvotes->joueurId,
                            "votantId" => $dailyvotes->votantId,

                        ]);
                    }


                } else {
                    echo json_encode(["todo" => "wanttoave"]);
                }

                break;
            case 'wanttoave':
                unset($formdata->todo);
                $joueurId = $formdata->joueurId;
                unset($formdata->todo);
                unset($formdata->joueurId);
                $votant = Votant::create((array)$formdata);
                $datsaofDaily = [
                    'joueurId' => $joueurId,
                    'votantId' => $votant->id,
                ];
                $voted = Dailyvotes::create($datsaofDaily);
                $joueur = Joueur::find($joueurId);
                if (!empty ($joueur)) {
                    $joueur = Joueur::where('id', '=', $joueurId)->update(['vote' => $joueur->vote + 1]);

                    echo json_encode(["todo" => "saved"]);
                }


                break;
            case 'delete':

                $joueur = Joueur::find($formdata->joueurId);
                if (!empty ($joueur)) {
                    $joueur = Joueur::where('id', '=', $joueur->id)->update(['vote' => $joueur->vote - 1]);
                    $dailyvotes = Dailyvotes::yetVoted($formdata->votantId);
                    Dailyvotes::where('id', '=', $dailyvotes->id)->delete();
                    Votant::where('id', '=', $formdata->votantId)->delete();
                    echo json_encode(["todo" => "done"]);
                }


                break;

            case 'update':
                //echo json_encode($formdata);
                $oldJoueur = Joueur::find($formdata->lastjoueur);
                $newjoueur = Joueur::find($formdata->joueurId);
                if (!empty ($newjoueur) && !empty($oldJoueur)) {
                    $joueur = Joueur::where('id', '=', $oldJoueur->id)->update(['vote' => $oldJoueur->vote - 1]);
                    $joueur = Joueur::where('id', '=', $newjoueur->id)->update(['vote' => $newjoueur->vote + 1]);
                    $dailyvotes = Dailyvotes::yetVoted($formdata->votantId);
                    //$daly=Dailyvotes::where('id','=',$dailyvotes->id)->delete();
                    Dailyvotes::where('id', '=', $dailyvotes->id)->update([
                        'joueurId' => $formdata->joueurId
                    ]);
                    echo json_encode(["todo" => "done"]);
                }


                break;
        }
        //return response()->json(['id'=>$votant
        //]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
