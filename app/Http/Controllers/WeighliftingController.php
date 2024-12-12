<?php

namespace App\Http\Controllers;

use App\Models\Weighlifting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WeighliftingRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class WeighliftingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');
        
        $weighliftings = Weighlifting::where('user_id', Auth::id())
            ->where(function($query) use ($search) {
                if ($search) {
                    $query->where('nombre', 'LIKE', "%{$search}%")
                          ->orWhere('fecha', 'LIKE', "%{$search}%")
                          ->orWhere('peso', 'LIKE', "%{$search}%");
                }
            })
            ->orderBy('fecha', 'desc')  // Ordenar por fecha, puedes cambiarlo según tus necesidades
            ->paginate(10);

        return view('weighlifting.index', compact('weighliftings'))
            ->with('i', ($request->input('page', 1) - 1) * $weighliftings->perPage());
            
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $weighlifting = new Weighlifting();

        return view('weighlifting.create', compact('weighlifting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeighliftingRequest $request): RedirectResponse
    {
        Auth::user()->weighliftings()->create($request->validated());

        return Redirect::route('weighliftings.index')
            ->with('success', 'Weighlifting created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $weighlifting = Weighlifting::findOrFail($id);
      // Verifica que el usuario autenticado sea el propietario
        if ($weighlifting->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }

        return view('weighlifting.show', compact('weighlifting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $weighlifting = Weighlifting::findOrFail($id);
       // Verifica que el usuario autenticado sea el propietario
        if ($weighlifting->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }

        return view('weighlifting.edit', compact('weighlifting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeighliftingRequest $request, Weighlifting $weighlifting): RedirectResponse
    {
        $weighlifting->update($request->validated());

        return Redirect::route('weighliftings.index')
            ->with('success', 'Weighlifting updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $weighlifting = Weighlifting::findOrFail($id);
    
        // Verifica que el usuario autenticado sea el propietario 
        if ($weighlifting->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }
        
        $weighlifting->delete();

        return Redirect::route('weighliftings.index')
            ->with('success', 'Weighlifting deleted successfully');
    }
}
