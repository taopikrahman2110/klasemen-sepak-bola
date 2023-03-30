@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header">{{ __('Create Match') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('match.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="home_team_id" class="col-md-4 col-form-label text-md-right">{{ __('Home Team') }}</label>

                                <div class="col-md-6">
                                    <select name="home_team_id" class="form-control">
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('home_team_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="away_team_id" class="col-md-4 col-form-label text-md-right">{{ __('Away Team') }}</label>

                                <div class="col-md-6">
                                    <select name="away_team_id" class="form-control">
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('away_team_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="home_goals" class="col-md-4 col-form-label text-md-right">{{ __('Home Team Goals') }}</label>

                                <div class="col-md-6">
                                    <input id="home_goals" type="number" class="form-control @error('home_goals') is-invalid @enderror" name="home_goals" value="{{ old('home_team_goals') }}" required autocomplete="home_team_goals">

                                    @error('home_goals')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="away_goals" class="col-md-4 col-form-label text-md-right">{{ __('Away Team Goals') }}</label>

                                <div class="col-md-6">
                                    <input id="away_goals" type="number" class="form-control @error('away_goals') is-invalid @enderror" name="away_goals" value="{{ old('away_goals') }}" required autocomplete="away_goals">

                                    @error('away_goals')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <label for="away_goals" class="col-md-4 col-form-label text-md-right">{{ __('Match Date') }}</label>
                                <div class="col-md-6">
                                    <input id="match_date" type="date" class="form-control @error('match_date') is-invalid @enderror" name="match_date" value="{{ old('match_date') }}" required autocomplete="match_date">

                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Match') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

