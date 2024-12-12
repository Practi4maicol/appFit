@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Wod
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Wod</span>
                    </div>

                            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> Hubo algunos problemas con los datos ingresados.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('wods.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('wod.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
