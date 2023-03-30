@extends('layouts.app')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Team List') }}</div>
                    <div class="row">
                        <div class="col-lg-12 margin-tb">

                            <div class="pull-right card-body">
                                <a class="btn btn-sm btn-success mt-2" href="{{ route('team.create') }}"> Create New
                                    Team</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Kota</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @php $no = 1 @endphp
                            @foreach ($teams as $team)
                                <tbody>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{$team->kota}}</td>
                                    <td>
                                        <form action="{{ route('team.destroy',$team->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('team.show',$team->id) }}">Show</a>
                                            <a class="btn btn-primary"
                                               href="{{ route('team.edit',$team->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
