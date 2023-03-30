@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Add New Team</h2>
        </div>

    </div>
</div>
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

<form action="{{ route('team.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <strong>kota:</strong>
                <input type="text" name="kota" class="form-control" placeholder="kota">
            </div>
        </div>
        <div class="col-lg-12 mt-2">
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection

