@extends('layouts.app')

@section('content')
    <div class="container">


        <h1>All Trucks table</h1>

        <p>
            <a class="btn btn-sm btn-success" href="{{ route('truck.create') }}">Add New Truck</a>
        </p>

        <p>

                <form action="{{ route('truck.index') }}" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="search" name="q" class="form-control" placeholder="Search...">

                       <button type="submit" name="search" id="search-btn" class="btn btn-sm btn btn-success">Search
                      </button>

                    </div>
                </form>
        <!-- /.search form -->
        </p>

        <p>

        </p>

        @forelse($trucks as $truck)
            @if($loop->first)
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">
                            <a href="{{ route('truck.index', ['sort_by'=> 'id', 'sort_order' => request()->input('sort_order', 'desc') == 'desc'? 'asc' : 'desc']) }}">
                                #
                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{ route('truck.index', ['sort_by'=> 'make', 'sort_order' => request()->input('sort_order', 'desc') == 'desc'? 'asc' : 'desc']) }}">
                                Model
                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{ route('truck.index', ['sort_by'=> 'year', 'sort_order' => request()->input('sort_order', 'desc') == 'desc'? 'asc' : 'desc']) }}">
                                Year
                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{ route('truck.index', ['sort_by'=> 'owner', 'sort_order' => request()->input('sort_order', 'desc') == 'desc'? 'asc' : 'desc']) }}">
                                Owner
                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{ route('truck.index', ['sort_by'=> 'total_owners', 'sort_order' => request()->input('sort_order', 'desc') == 'desc'? 'asc' : 'desc']) }}">
                                Total Owners
                            </a>
                        </th>
                        <th scope="col">
                            <a href="{{ route('truck.index', ['sort_by'=> 'year', 'sort_order' => request()->input('sort_order', 'desc') == 'desc'? 'asc' : 'desc']) }}">
                                Comments
                            </a>
                        </th>
{{--                        <th scope="col">Actions</th>--}}
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
{{--                        <td>--}}
{{--                            <button class="btn btn-sm btn-success">Show</button>--}}
{{--                            <button class="btn btn-sm btn-info">Edit</button>--}}
{{--                            <button class="btn btn-sm btn-danger">Delete</button>--}}
{{--                        </td>--}}
                    </tr>
                    @if($loop->last)
                    </tbody>
                </table>
            @endif
        @empty
            <h1>No records of trucks</h1>
    @endforelse


@endsection
