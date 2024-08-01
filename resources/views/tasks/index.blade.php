@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px;">
    <a href="{{ route('tasks.create') }}" class="btn btn-primary" style="background-color: #3490dc; border-color: #3490dc; font-size: 200%; margin-left: 5%;">Add Task</a>
    <table class="table" style="width: 100%; margin-top: 20px; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="text-align: center; padding: 8px; background-color: #f8f9fa; border: 1px solid #dee2e6;">ID</th>
                <th style="text-align: center; padding: 8px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Title</th>
                <th style="text-align: center; padding: 8px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Description</th>
                <th style="text-align: center; padding: 8px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Status</th>
                <th style="text-align: center; padding: 8px; background-color: #f8f9fa; border: 1px solid #dee2e6;">User</th>
                <th style="text-align: center; padding: 8px; background-color: #f8f9fa; border: 1px solid #dee2e6;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td style="text-align: center; padding: 8px; border: 1px solid #dee2e6;">{{ $task->id }}</td>
                    <td style="text-align: center; padding: 8px; border: 1px solid #dee2e6;">{{ $task->title }}</td>
                    <td style="text-align: center; padding: 8px; border: 1px solid #dee2e6;">{{ $task->description }}</td>
                    <td style="text-align: center; padding: 8px; border: 1px solid #dee2e6;">{{ $task->status }}</td>
                    <td style="text-align: center; padding: 8px; border: 1px solid #dee2e6;">{{ $task->user->name }}</td>
                    <td style="text-align: center; padding: 8px; border: 1px solid #dee2e6;">
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning" style="background-color: #ffcc00; border-color: #ffcc00;">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="background-color: #e3342f; border-color: #e3342f;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
