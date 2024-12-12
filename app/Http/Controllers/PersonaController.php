<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PersonaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Auth;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //$personas = Persona::paginate();
        $personas = Persona::where('user_id', Auth::id())
        ->paginate(); //método para que filtre los WODs por el user_id del usuario autenticado
        return view('persona.index', compact('personas'))
            ->with('i', ($request->input('page', 1) - 1) * $personas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $persona = new Persona();

        return view('persona.create', compact('persona'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|date',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'inicioEntrenamiento' => 'required|date',
        ]);
    
        $user = Auth::user();
    
        // Verifica si el usuario ya ha creado una persona
        if ($user->personas()->count() > 0) {
            return redirect()->route('personas.index')->with('error', 'Solo puedes crear una persona.');
        }

        try {
        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->edad = $request->edad;
        $persona->peso = $request->peso;
        $persona->altura = $request->altura;
        $persona->inicioEntrenamiento = $request->inicioEntrenamiento;
        $persona->user_id = $user->id; // Asegúrate de usar el ID del usuario autenticado 
        $persona->save();
    
       return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('personas.index')->with('error', 'Hubo un problema al crear la persona. Por favor, verifica los datos e intenta nuevamente.');
        }
     
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $persona = Persona::find($id);

        if ($persona->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }

        return view('persona.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $persona = Persona::find($id);
       // Verifica que el usuario autenticado sea el propietario
        if ($persona->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }

        return view('persona.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonaRequest $request, Persona $persona): RedirectResponse
    {
        $persona->update($request->validated());

        return Redirect::route('personas.index')
            ->with('success', 'Actualización de forma exitosa');
    }

    public function destroy($id): RedirectResponse
    {
        $persona= Persona::findOrFail($id);
    
        // Verifica que el usuario autenticado sea el propietario del WOD
        if ($persona->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }
        
        $persona->delete();
        return Redirect::route('personas.index')
            ->with('success', 'Datos eliminados');
    }
}
