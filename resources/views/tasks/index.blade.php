@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-6 mt-1 mb-5">

            @if (session()->has('msg'))
                <div class="alert alert-success">{{ session()->get('msg') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    Add Task
                </div>
                <div class="card-body">

                    <form action="{{ route('task.create') }}" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Task"
                                   class="form-control {{ $errors->has('title')  ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{ $errors->has('title') ? $errors->first('title') : '' }}
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">All Tasks</div>
                <div class="card-body">

                    @if($tasks->count())
                    <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Task</th>
                                <th width="1em">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                        <form action="{{ route('task.delete', $task->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                    @else
                        <h4>No, tasks</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection