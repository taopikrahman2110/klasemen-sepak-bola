@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Match List') }}</div>
                    <div class="pull-right card-body">
                        <a class="btn btn-sm btn-success mt-2" href="{{ route('match.create') }}"> Create Club</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Home Team</th>
                                    <th scope="col">Home Score</th>
                                    <th scope="col">Away Score</th>
                                    <th scope="col">Away Team</th>
                                    <th scope="col">Match Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($matches as $match)
                                    <tr>
                                        <th scope="row">{{$no++}}</th>
                                        <td>{{ $match->homeTeam->name }}</td>
                                        <td>{{ $match->home_goals }}</td>
                                        <td>{{ $match->away_goals }}</td>
                                        <td>{{ $match->awayTeam->name }}</td>
                                        <td>{{ $match->match_date }}</td>
                                        <td>
                                            <a href="{{ route('match.edit', ['match' => $match]) }}"
                                               class="btn btn-primary btn-sm">
                                                Edit
                                            </a>
                                            <form action="{{ route('match.destroy', ['match' => $match]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @if (session('warning'))
                                        <div class="alert alert-warning">
                                            {{ session('warning') }}
                                        </div>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
