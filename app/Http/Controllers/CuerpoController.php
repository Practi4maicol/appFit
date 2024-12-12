<?php

namespace App\Http\Controllers;

use App\Models\Cuerpo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CuerpoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;

class CuerpoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cuerpos = Cuerpo::paginate();
    
        // Obtener los datos para el gráfico
        $bicepDer = Cuerpo::pluck('bicepDer');
        $bicepIzq = Cuerpo::pluck('bicepIzq');
        $pecho = Cuerpo::pluck('pecho');
        $abdomen = Cuerpo::pluck('abdomen');
        $piernaDer = Cuerpo::pluck('piernaDer');
        $piernaIzq = Cuerpo::pluck('piernaIzq');
        $nalgas = Cuerpo::pluck('nalgas');
        $pantorrillas = Cuerpo::pluck('pantorrillas');
        
        // Extraer las fechas y formatearlas
        $labels = Cuerpo::pluck('fecha')->map(function ($fecha) {
            return Carbon::parse($fecha)->format('d-m-Y');
        });
    
        return view('cuerpo.index', compact('cuerpos', 'bicepDer', 'bicepIzq', 'pecho', 'abdomen', 'piernaDer', 'piernaIzq', 'nalgas', 'pantorrillas', 'labels'))
            ->with('i', ($request->input('page', 1) - 1) * $cuerpos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cuerpo = new Cuerpo();

        return view('cuerpo.create', compact('cuerpo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CuerpoRequest $request): RedirectResponse
    {
        Cuerpo::create($request->validated());

        return Redirect::route('cuerpos.index')
            ->with('success', 'Cuerpo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cuerpo = Cuerpo::find($id);

        return view('cuerpo.show', compact('cuerpo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cuerpo = Cuerpo::find($id);

        return view('cuerpo.edit', compact('cuerpo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CuerpoRequest $request, Cuerpo $cuerpo): RedirectResponse
    {
        $cuerpo->update($request->validated());

        return Redirect::route('cuerpos.index')
            ->with('success', 'Actualización con exito');
    }

    public function destroy($id): RedirectResponse
    {
        Cuerpo::find($id)->delete();

        return Redirect::route('cuerpos.index')
            ->with('success', 'Borrado');
    }
 
    
}