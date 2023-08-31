<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Filters\V1\EtudiantQuery;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreEtudiantRequest;
use App\Http\Resources\V1\EtudiantResource;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
    public function index(Request $request)
    {
        //return  new EtudiantResource(Etudiant::find(1));

        // $filter = new EtudiantQuery();

        // $queryItems = $filter->transform($request);

        // if (count($queryItems) ==0){
        //          return   EtudiantResource::collection(Etudiant::paginate());

        // }else{
        //       return   EtudiantResource::collection(Etudiant::where($queryItems)->paginate());

        // }

        $etudiants = EtudiantResource::collection(Etudiant::all());

        if($etudiants->count() > 0){
            return response()->json([
                    'status' => 200,
                    'etudiants' => $etudiants
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message'=>'Aucun etudiant trouvé'
            ],404 );
        }
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
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nom' => 'required|max:150',
            'prenom' => 'required|max:255',
            'adresse' => 'required|max:255',
            'telephone' => 'required',
            'classe_id' => 'required',
        ]);

        if ($validated->fails()){
            return response()->json([
                'status' => 422,
                'errors'=>$validated->messages(),
            ],422);
        }else{

                $etudiant = Etudiant::create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'adresse' => $request->adresse,
                    'telephone' => $request->telephone,
                    'classe_id' => $request->classe_id,
                ]);

                if($etudiant){
                    return response()->json([
                        'status' => 200,
                        'message' => "Etudiant crée avec succès !!"
                    ],200);

                }else{

                    return response()->json([
                        'status' => 500,
                        'message' => "
                        quelque chose s'est mal passé"
                    ],500);
                }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $id)
    {
        $etudiant = Etudiant::find($id);

        if($etudiant){

            return response()->json([
                'status' => 200,
                'etudiant' => $etudiant
            ],200);

        }else{

            return response()->json([
                'status' => 404,
                'message' => "Etudiant n'existe pas "
            ],404);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $etudiant = Etudiant::find($id);

        if($etudiant){

            return response()->json([
                'status' => 200,
                'etudiant' => $etudiant
            ],200);

        }else{

            return response()->json([
                'status' => 404,
                'message' => "Etudiant n'existe pas "
            ],404);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEtudiantRequest  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nom' => 'required|max:150',
            'prenom' => 'required|max:255',
            'adresse' => 'required|max:255',
            'telephone' => 'required',
            'classe_id' => 'required',
        ]);


        if ($validated->fails()){
            return response()->json([
                'status' => 422,
                'errors'=>$validated->messages(),
            ],422);
        }else{

            $etudiant = Etudiant::find($request-> id);


                if($etudiant){


                    $etudiant->update([
                        'nom' => $request->nom,
                        'prenom' => $request->prenom,
                        'adresse' => $request->adresse,
                        'telephone' => $request->telephone,
                        'classe_id' => $request->classe_id,
                    ]);

                    return response()->json([
                        'status' => 200,
                        'message' => "Etudiant modifié avec succès"
                    ],200);

                }else{

                    return response()->json([
                        'status' => 404,
                        'message' => "Etudiat non trouver"
                    ],404);
                }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id){

        $etudiant = Etudiant::find($id);

        if($etudiant){

            $etudiant->delete();
            return response()->json([
                'status' => 200,
                'message' => "Etudiant supprimer avec succès"
            ],200);

        }else{

            return response()->json([
                'status' => 404,
                'message' => "Etudiant n'existe pas "
            ],404);

        }
    }
}
