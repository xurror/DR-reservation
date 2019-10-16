@extends('layouts.app')

@section('content')

    <h2>
        {{ __('Packages') }}
        <a href="/admin/packages/create" class="btn btn-outline-success fas fa-plus"></a>
    </h2>

    
    <div class="table-responsive">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            @if (count($packages) > 0)
            @foreach ($packages as $package)
            <form action="/admin/packages/{{ $package->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <tbody>
                    <tr>
                        <td>
                            <a href="" data-toggle="modal" data-target="#{{ $package->id }}">
                                {{ $package->id }}
                            </a>
                        </td>
                        <td>{{ $package->description }}</td>
                        <td>{{ $package->price }}</td>
                        <td>{{ $package->status }}</td>
                        <th>{{ $package->image }}</th>

                        <td>
                            <a href="/admin/packages/{{ $package->id }}/edit" class="btn btn-outline-primary fas fa-edit"></a>
                            |
                            <button type="button" class="btn btn-outline-danger fas fa-trash" data-toggle="modal" data-target="#delete{{ $package->id }}"></button>
                        </td>

                    </tr>
                </tbody>

                <!-- Modal -->
                <div class="modal fade" id="delete{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $package->id }}Title" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="{{ $package->id }}Title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Are you sure you want to delete package {{ $package->id }}
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Yes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        </div>
                    </div>
                    </div>
                </div>

            </form>

            <!-- Modal -->
            <div class="modal fade" id="{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="exampleModalCenterTitle">{{ $package->id }}</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><big><label>Description:</label>&ensp; {{ $package->description }}</big></p>
                            <p><big><label>Price:</label>&ensp; {{ $package->price }}</big></p>
                            <p><big><label>Status:</label>&ensp; {{ $package->status }}</big></p>
                            <p><big><label>Image:</label>&ensp; {{ $package->image }}</big></p>
                        </div>
                        <div class="modal-footer">
                            <a href="/admin/packages/{{ $package->id }}/edit">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </a>
                            &ensp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <p>No packages</p>
            @endif
        </table>
        {{ $packages->links() }}
    </div>    

@endsection
