@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header bg-white">
                    Panel de Control - Sistema de Matrícula
                </div>

                <div class="card-body text-center py-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="mb-3">¡Bienvenido, {{ Auth::user()->name }}!</h4>
                    <p class="text-muted">Has iniciado sesión correctamente.</p>
                    
                    <div class="mt-4">
                        <p>Desde aquí podrás gestionar todo el sistema.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection