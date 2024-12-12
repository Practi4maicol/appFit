@extends('layouts.app')

@section('template_title')
    Cuerpos
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">{{ __('Medidas de mi cuerpo ') }}</span>
                        <div class="float-right">
                            <a href="{{ route('cuerpos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>BicepDer</th>
                                    <th>BicepIzq</th>
                                    <th>Pecho</th>
                                    <th>Abdomen</th>
                                    <th>PiernaDer</th>
                                    <th>PiernaIzq</th>
                                    <th>Nalgas</th>
                                    <th>Pantorrillas</th>
                                    <th>Fecha</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuerpos as $cuerpo)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $cuerpo->bicepDer }}</td>
                                        <td>{{ $cuerpo->bicepIzq }}</td>
                                        <td>{{ $cuerpo->pecho }}</td>
                                        <td>{{ $cuerpo->abdomen }}</td>
                                        <td>{{ $cuerpo->piernaDer }}</td>
                                        <td>{{ $cuerpo->piernaIzq }}</td>
                                        <td>{{ $cuerpo->nalgas }}</td>
                                        <td>{{ $cuerpo->pantorrillas }}</td>
                                        <td>{{ $cuerpo->fecha }}</td>
                                        <td>
                                            <form action="{{ route('cuerpos.destroy', $cuerpo->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('cuerpos.show', $cuerpo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('cuerpos.edit', $cuerpo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $cuerpos->withQueryString()->links() !!}
        </div>
    </div>

    <!-- Aquí el lienzo para el gráfico -->
    <div class="card mt-4">
        <div class="card-header">
            <span>Gráfico de Medidas Corporales</span>
        </div>
        <div class="card-body">
            <canvas id="graficoMedidas" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<!-- Cargar Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Obtener el contexto del lienzo
    var ctx = document.getElementById('graficoMedidas').getContext('2d');

    // Crear el gráfico
    var chart = new Chart(ctx, {
        type: 'line', // Tipo de gráfico: lineal
        data: {
            labels: @json($labels), // Etiquetas (fechas)
            datasets: [
                {
                    label: 'Bíceps Derecho',
                    data: @json($bicepDer),
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: false
                },
                {
                    label: 'Bíceps Izquierdo',
                    data: @json($bicepIzq),
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: false
                },
                {
                    label: 'Pecho',
                    data: @json($pecho),
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false
                },
                {
                    label: 'Abdomen',
                    data: @json($abdomen),
                    borderColor: 'rgb(153, 102, 255)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: false
                },
                {
                    label: 'Pierna Derecha',
                    data: @json($piernaDer),
                    borderColor: 'rgb(255, 206, 86)',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    fill: false
                },
                {
                    label: 'Pierna Izquierda',
                    data: @json($piernaIzq),
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false
                },
                {
                    label: 'Nalgas',
                    data: @json($nalgas),
                    borderColor: 'rgb(255, 159, 64)',
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    fill: false
                },
                {
                    label: 'Pantorrillas',
                    data: @json($pantorrillas),
                    borderColor: 'rgb(199, 199, 199)',
                    backgroundColor: 'rgba(199, 199, 199, 0.2)',
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Comparativa de Medidas Corporales'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Fecha'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Medidas cm'
                    }
                }
            }
        }
    });
</script>

@endsection
