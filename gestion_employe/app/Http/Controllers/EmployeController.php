<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');
        $employes = Employe::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhereHas('departement', function ($query) use ($search) {
                $query->where('nom', 'LIKE', "%{$search}%");
            })->get();
       // dd($employes);
        $departements = Departement::withCount('employes')->get();

        return view('affichage', compact('employes', 'departements'));//'departements'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departements = Departement::all();
        return view('welcome', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $regle = [
            'name' => 'required',
            'email' => 'required|email',
            'position' => "required",
            'departement' => 'required|exists:departements,id',
        ];
        $validateData = $request->validate($regle);
        $employe = new Employe();
        $employe->departement_id = $request->input('departement');
        $employe->name = $request->input('name');
        $employe->email = $request->input('email');
        $employe->position = $request->input('position');
        $employe->save();
        return redirect()->route('affichage.ressources');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $employe = Employe::findOrFail($id);
        
        $departements = Departement::all();
        return view('update', compact('employe', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employe = Employe::findOrFail($id);
        $employe->name = $request->input('name');
        $employe->email = $request->input('email');
        $employe->position = $request->input('position');
        $employe->departement_id = $request->input('departement');
        $employe->update();
        return redirect()->route('affichage.ressources');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect()->route('affichage.ressources');
    }
}
