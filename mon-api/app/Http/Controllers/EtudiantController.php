<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function inscrire(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'post_nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'genre' => 'required|string',
            'date_naissance' => 'required|date',
            'matricule' => 'required|string|unique:etudiants,matricule',
            'email' => 'required|email|unique:etudiants,email',
            'password' => 'required|string|min:8',
        ]);

        $etudiant = Etudiant::create($validatedData);
        return response()->json($etudiant, 201);
    }

    public function obtenirTousLesEtudiants()
    {
        return response()->json(Etudiant::all());
    }

    public function obtenirEtudiantParId($id)
    {
        $etudiant = Etudiant::find($id);
        if (!$etudiant) {
            return response()->json(['message' => 'Etudiant non trouvé'], 404);
        }
        return response()->json($etudiant);
    }

    public function mettreAJourEtudiant(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'post_nom' => 'sometimes|required|string|max:255',
            'prenom' => 'sometimes|required|string|max:255',
            'genre' => 'sometimes|required|string',
            'date_naissance' => 'sometimes|required|date',
            'matricule' => 'sometimes|required|string|unique:etudiants,matricule,' . $id,
            'email' => 'sometimes|required|email|unique:etudiants,email,' . $id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        $etudiant = Etudiant::find($id);
        if (!$etudiant) {
            return response()->json(['message' => 'Etudiant non trouvé'], 404);
        }

        $etudiant->update($validatedData);
        return response()->json($etudiant);
    }

    public function supprimerEtudiant($id)
    {
        $etudiant = Etudiant::find($id);
        if (!$etudiant) {
            return response()->json(['message' => 'Etudiant non trouvé'], 404);
        }

        $etudiant->delete();
        return response()->json(null, 204);
    }
}