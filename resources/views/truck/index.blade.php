@extends('layouts.app')

@section('content')
    <div class="container">


        <h1>All Trucks table</h1>
        <small>
            <a class="btn btn-sm btn-success" href="{{ route('truck.create') }}">Add New Truck</a>
        </small>

        @forelse($trucks as $truck)
            @if($loop->first)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Model</th>
                        <th scope="col">Year</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Total Owners</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @endif
                    <tr>
                        <th scope="row">{{ $truck->id }}</th>
                        <td>{{ $truck->truckName->name ?? '' }}</td>
                        <td>{{ $truck->year }}</td>
                        <td>{{ $truck->owner }}</td>
                        <td>{{ $truck->total_owners }}</td>
                        <td>{{ $truck->comments }}</td>
                        <td>
                            <button class="btn btn-sm btn-success">Show</button>
                            <button class="btn btn-sm btn-info">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </td>
                    </tr>
                    @if($loop->last)
                    </tbody>
                </table>
            @endif
        @empty
            <h1>No records of trucks</h1>
    @endforelse


@endsection
