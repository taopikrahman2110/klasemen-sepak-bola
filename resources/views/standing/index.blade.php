@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Klasemen List') }}</div>


                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Club</th>
                                <th>Ma</th>
                                <th>Me</th>
                                <th>S</th>
                                <th>K</th>
                                <th>GM</th>
                                <th>GK</th>
                                <th>GD</th>
                                <th>Points</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($standings as $standing)
                                <tr>
                                    <td>{{ $no ++ }}</td>
                                    <td>{{ $standing->team->name }}</td>
                                    <td>{{ $standing->played }}</td>
                                    <td>{{ $standing->win }}</td>
                                    <td>{{ $standing->draw }}</td>
                                    <td>{{ $standing->lose }}</td>
                                    <td>{{ $standing->goal_for }}</td>
                                    <td>{{ $standing->goal_against }}</td>
                                    <td>{{ $standing->goal_difference }}</td>
                                    <td>{{ $standing->points }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
