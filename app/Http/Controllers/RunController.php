<?php

namespace App\Http\Controllers;

use App\Models\Run;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RunRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class RunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    { 
        $search = $request->query('search');
         //método para que filtre los WODs por el user_id del usuario autenticado
        $runs = Run::where('user_id', Auth::id())
        ->where(function($query) use ($search) {
            if ($search) {
                $query->where('descripción', 'LIKE', "%{$search}%")
                      ->orWhere('distancia', 'LIKE', "%{$search}%")
                      ->orWhere('fecha', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('fecha', 'desc')  // Ordenar por fecha, puedes cambiarlo según tus necesidades
        ->paginate(10);

        return view('run.index', compact('runs'))
            ->with('i', ($request->input('page', 1) - 1) * $runs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $run = new Run();

        return view('run.create', compact('run'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RunRequest $request): RedirectResponse
    {
        Auth::user()->runs()->create($request->validated());

        return Redirect::route('runs.index')
            ->with('success', 'Run created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $run = Run::find($id);
        // Verifica que el usuario autenticado sea el propietario
        if ($run->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }

        return view('run.show', compact('run'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $run = Run::findOrFail($id);
        // Verifica que el usuario autenticado sea el propietario
        if ($run->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }

        return view('run.edit', compact('run'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RunRequest $request, Run $run): RedirectResponse
    {
        $run->update($request->validated());

        return Redirect::route('runs.index')
            ->with('success', 'Run updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $run= Run::findOrFail($id);
    
        // Verifica que el usuario autenticado sea el propietario del WOD
        if ($run->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }
        
        $run->delete();

        return Redirect::route('runs.index')
            ->with('success', 'Run deleted successfully');
    }
}
