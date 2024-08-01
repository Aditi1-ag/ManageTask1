@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px; margin-left: 20%; width: 60%;">
    <h1 style="margin-bottom: 20px;">Edit Task</h1>
    <div class="form-box" style="border: 1px solid #ced4da; padding: 20px; border-radius: 8px; background-color: #f8f9fa;">
        <form action="{{ route('tasks.update', $task) }}" method="POST" style="margin-bottom: 20px;">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="title" style="display: block; margin-bottom: 5px;">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
                <textarea name="description" class="form-control" id="description" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">{{ $task->description }}</textarea>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="status" style="display: block; margin-bottom: 5px;">Status</label>
                <input type="text" name="status" class="form-control" id="status" value="{{ $task->status }}" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="user_id" style="display: block; margin-bottom: 5px;">User</label>
                <select name="user_id" class="form-control" id="user_id" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
                    <option value="{{ auth()->user()->id }}" {{ $task->user_id == auth()->user()->id ? 'selected' : '' }}>{{ auth()->user()->name }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #3490dc; border-color: #3490dc; padding: 10px 20px; border-radius: 4px;">Update Task</button>
        </form>
    </div>
</div>
@endsection
