@extends('layouts.master')

@section('content')

    <div class="row">
    <div class="col-sm-6">
        <!-- @if ($errors->any())

                @foreach ($errors->all() as $error)

                    <div class="alert alert-danger">
                            {{ $error }}
                    </div>

                @endforeach

            @endif -->

            @if (session()->has('msg'))
                <div class="alert alert-danger">{{ session()->get('msg')}}</div>
            @endif

        <div class="card border-danger">
            <h5 class="card-header text-center text-danger">Add Task</h5>
            <div class="card-body text-danger">
                <form action="{{ route('task.create') }}" method="post">
                @csrf
                    <div class="form-group">                        
                        <label for="task">Task</label>
                        <input type="text" name="title" id="task" placeholder="Task" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
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
    </div>
    <div class="col-sm-6">
        <div class="card border-danger">
            <h5 class="card-header text-center text-danger">Show Tasks</h5>
            <div class="card-body text-danger">
            <table class="table table-bordered ">                    
                    <tr>
                        <th class="text-danger">Task</th>
                        <th class="text-danger" style="width:2em;">Action</th>
                    </tr>

                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>
                            <form action="{{ route('task.destory', $task->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>                            
                        </td>
                    </tr>                
                    @endforeach
                
                </table>
            </div>
        </div>
    </div>
    </div>


@endsection