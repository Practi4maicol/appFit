<?php

namespace App\Http\Controllers;

use App\Models\Otro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OtroRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class OtroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');
        //método para que filtre los WODs por el user_id del usuario autenticado
        $otros = Otro::where('user_id', Auth::id())
        ->where(function($query) use ($search) {
            if ($search) {
                $query->where('descripción', 'LIKE', "%{$search}%")
                      ->orWhere('fecha', 'LIKE', "%{$search}%")
                      ->orWhere('datosFinales', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('fecha', 'desc')  // Ordenar por fecha, puedes cambiarlo según tus necesidades
        ->paginate(10); 
        

        return view('otro.index', compact('otros'))
            ->with('i', ($request->input('page', 1) - 1) * $otros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $otro = new Otro();

        return view('otro.create', compact('otro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OtroRequest $request): RedirectResponse
    {
        Auth::user()->otros()->create($request->validated());

        return Redirect::route('otros.index')
            ->with('success', 'Otro created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $otro = Otro::find($id);
        // Verifica que el usuario autenticado sea el propietario
        if ($otro->user_id !== Auth::id()) {
           abort(403, 'Acceso no autorizado.');
        }

        return view('otro.show', compact('otro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $otro = Otro::find($id);
                // Verifica que el usuario autenticado sea el propietario
                if ($otro->user_id !== Auth::id()) {
                    abort(403, 'Acceso no autorizado.');
                }

        return view('otro.edit', compact('otro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OtroRequest $request, Otro $otro): RedirectResponse
    {
        $otro->update($request->validated());

        return Redirect::route('otros.index')
            ->with('success', 'Otro updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $otro = Otro::findOrFail($id);
    
        // Verifica que el usuario autenticado sea el propietario del WOD
        if ($otro->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }
        
        $otro->delete();

        return Redirect::route('otros.index')
            ->with('success', 'Otro deleted successfully');
    }
}
