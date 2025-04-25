<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User; // Remplacez par le nom de votre modèle

class MonApiController extends Controller
{
    // Récupérer toutes les ressources
    public function index()
    {
        $resources = VotreModel::all();
        return response()->json($resources);
    }

    // Créer une nouvelle ressource
    public function store(Request $request)
    {
        $resource = VotreModel::create($request->all());
        return response()->json($resource, 201);
    }

    // Récupérer une ressource spécifique
    public function show($id)
    {
        $resource = VotreModel::findOrFail($id);
        return response()->json($resource);
    }

    // Mettre à jour une ressource existante
    public function update(Request $request, $id)
    {
        $resource = VotreModel::findOrFail($id);
        $resource->update($request->all());
        return response()->json($resource);
    }

    // Supprimer une ressource
    public function destroy($id)
    {
        VotreModel::destroy($id);
        return response()->json(null, 204);
    }
}