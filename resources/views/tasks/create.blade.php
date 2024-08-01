@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px; margin-left: 20%; width: 60%;">
    <h1 style="margin-bottom: 20px;">Add Task</h1>
    <div class="form-box" style="border: 1px solid #ced4da; padding: 20px; border-radius: 8px; background-color: #f8f9fa;">
        <form id="taskForm" action="{{ route('tasks.store') }}" method="POST" style="margin-bottom: 20px;">
            @csrf
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="title" style="display: block; margin-bottom: 5px;">Title</label>
                <input type="text" name="title" class="form-control" id="title" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
                <textarea name="description" class="form-control" id="description" style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;"></textarea>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="status" style="display: block; margin-bottom: 5px;">Status</label>
                <input type="text" name="status" class="form-control" id="status" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="user_id" style="display: block; margin-bottom: 5px;">User</label>
                <select name="user_id" class="form-control" id="user_id" required style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px;">
                    <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #3490dc; border-color: #3490dc; padding: 10px 20px; border-radius: 4px;">Add Task</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#taskForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    // Update the task list without refreshing the page
                    alert('Task added successfully!');
                },
                error: function(response) {
                    alert('Failed to add task. Please try again.');
                }
            });
        });
    </script>
</div>
@endsection
