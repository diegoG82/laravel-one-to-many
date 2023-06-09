@extends('layouts.admin')

@section('content')
        @include('partials.session_message')
    <h1 class="text-center mt-2">PROJECT LIST</h1>
    <div class="text-center m-4">
        <a class="btn btn-success text-center" href="{{ route('admin.projects.create') }}">NEW PROJECT</a>
    </div>



    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="col-2">ID</th>
                <th scope="col" class="col-2">TITLE</th>
                <th scope="col" class="col-2">SLUG</th>
                <th scope="col" class="col-4">CONTENT</th>
                <th scope="col" class="col-4">TYPE</th>
                <th scope="col" class="col-2">ACTION</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->content }}</td>
                    <td>{{ $project->type->name ?? 'N/A' }}</td>

                    <td>
                        <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project->slug) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-delete" onclick="return confirmDelete()">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                    </td>
                    <td>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{-- Script for delete popup --}}
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this Project?');
        }
    </script>
@endsection
