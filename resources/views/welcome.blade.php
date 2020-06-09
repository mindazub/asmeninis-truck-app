@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-4">Truck App</h1>
                <p class="lead">Truck app for php developer interview.</p>
                <p>
                    Mindaugas, +37067676790, mindaugas.azubalis@gmail.com
                </p>
            </div>
        </div>

        <a href="{{ route('truck.index') }}" type="button" class="btn btn-success btn-lg btn-block" >Truck table</a>

    </div>

@endsection
