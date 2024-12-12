<?php

namespace App\Http\Controllers;

use App\Models\Wod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WodRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class WodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');
         //método para que filtre los WODs por el user_id del usuario autenticado
        $wods = Wod::where('user_id', Auth::id())
        ->where(function($query) use ($search) {
            if ($search) {
                $query->where('descripción', 'LIKE', "%{$search}%")
                      ->orWhere('tiempoCompletado', 'LIKE', "%{$search}%")
                      ->orWhere('fechaRealizado', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('fechaRealizado', 'desc')  // Ordenar por fecha, puedes cambiarlo según tus necesidades
        ->paginate(10);
        
        return view('wod.index', compact('wods'))
            ->with('i', ($request->input('page', 1) - 1) * $wods->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $wod = new Wod();

        return view('wod.create', compact('wod'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WodRequest $request): RedirectResponse
    {
        try {
            Auth::user()->wods()->create($request->validated());// Verifica que el usuario autenticado sea el propietario
            return Redirect::route('wods.index')
                ->with('success', 'Wod creado exitosamente.');
        } catch (QueryException $e) {// mensaje para verificar datos correctos
            return Redirect::back()
                ->withErrors(['msg' => 'Hubo un error al ingresar los datos. Verifique el formato e intente nuevamente.'])
                ->withInput();
        }
            
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $wod = Wod::findOrFail($id);
        // Verifica que el usuario autenticado sea el propietario del WOD
            if ($wod->user_id !== Auth::id()) {
    abort(403, 'Acceso no autorizado.');
           }

        return view('wod.show', compact('wod'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $wod = Wod::findOrFail($id);
            // Verifica que el usuario autenticado sea el propietario del WOD
    if ($wod->user_id !== Auth::id()) {
        abort(403, 'Acceso no autorizado.');
    }

        return view('wod.edit', compact('wod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WodRequest $request, Wod $wod): RedirectResponse
    {
        $wod->update($request->validated());

        return Redirect::route('wods.index')
            ->with('success', 'Wod updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $wod = Wod::findOrFail($id);
    
        // Verifica que el usuario autenticado sea el propietario del WOD
        if ($wod->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }
        
        $wod->delete();

        return Redirect::route('wods.index')
            ->with('success', 'Wod deleted successfully');
    }
}
