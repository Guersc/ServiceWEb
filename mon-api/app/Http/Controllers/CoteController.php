<?php

namespace App\Http\Controllers;

use App\Models\Cote;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class CoteController extends Controller
{
    public function ajouterCote(Request $request)
    {
        $validatedData = $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'nom_cours' => 'required|string',
            'note' => 'required|numeric|min:0|max:20',
        ]);

        $cote = Cote::create($validatedData);
        return response()->json($cote, 201);
    }

    public function obtenirCotesParEtudiant($etudiantId)
    {
        $etudiant = Etudiant::find($etudiantId);
        if (!$etudiant) {
            return response()->json(['message' => 'Etudiant non trouvé'], 404);
        }

        return response()->json($etudiant->cotes);
    }

    public function mettreAJourCote(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_cours' => 'sometimes|required|string',
            'note' => 'sometimes|required|numeric|min:0|max:20',
        ]);

        $cote = Cote::find($id);
        if (!$cote) {
            return response()->json(['message' => 'Cote non trouvée'], 404);
        }

        $cote->update($validatedData);
        return response()->json($cote);
    }

    public function supprimerCote($id)
    {
        $cote = Cote::find($id);
        if (!$cote) {
            return response()->json(['message' => 'Cote non trouvée'], 404);
        }

        $cote->delete();
        return response()->json(null, 204);
    }
}