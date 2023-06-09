@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Create Type</h1>

    <form action="{{ route('admin.typess.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('admin.typess.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
