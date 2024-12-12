<?php

namespace App\Http\Controllers;

use App\Models\Benchmark;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BenchmarkRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class BenchmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');
        //método para que filtre los WODs por el user_id del usuario autenticado
        $benchmarks = Benchmark::where('user_id', Auth::id())
        ->where(function($query) use ($search) {
            if ($search) {
                $query->where('nombre', 'LIKE', "%{$search}%")
                      ->orWhere('descripción', 'LIKE', "%{$search}%")
                      ->orWhere('fechaRealizado', 'LIKE', "%{$search}%");
            }
        })
        ->orderBy('fechaRealizado', 'desc')  // Ordenar por fecha, puedes cambiarlo según tus necesidades
        ->paginate(10); 
        return view('benchmark.index', compact('benchmarks'))
            ->with('i', ($request->input('page', 1) - 1) * $benchmarks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $benchmark = new Benchmark();

        return view('benchmark.create', compact('benchmark'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BenchmarkRequest $request): RedirectResponse
    {
        Auth::user()->benchmarks()->create($request->validated());

        return Redirect::route('benchmarks.index')
            ->with('success', 'Benchmark created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $benchmark = Benchmark::find($id);
        if ($benchmark->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }
        return view('benchmark.show', compact('benchmark'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $benchmark = Benchmark::find($id);
        // Verifica que el usuario autenticado sea el propietario
        if ($benchmark->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }
        return view('benchmark.edit', compact('benchmark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BenchmarkRequest $request, Benchmark $benchmark): RedirectResponse
    {
        $benchmark->update($request->validated());

        return Redirect::route('benchmarks.index')
            ->with('success', 'Benchmark updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $benchmark = Benchmark::findOrFail($id);
    
        // Verifica que el usuario autenticado sea el propietario del WOD
        if ($benchmark->user_id !== Auth::id()) {
            abort(403, 'Acceso no autorizado.');
        }
        
        $benchmark->delete();

        return Redirect::route('benchmarks.index')
            ->with('success', 'Benchmark deleted successfully');
    }
}
