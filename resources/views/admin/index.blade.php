@extends('layouts.app')
{{-- @section('category')
active
@endsection --}}
@section('content')
{{-- @include('layouts.nav') --}}
{{-- <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
      <span class="breadcrumb-item active">Blank Page</span>
    </nav> --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="table table-dark">
                   <th>SL</th>
                   <th>Todo List</th>
                   <th>Date</th>
                   <th>Action</th>
                    @forelse ($todo_show as $todo )
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $todo->todo }}</td>
                            <td>{{ $todo->when }}</td>
                            <td>
                                <a href="{{ url('/todo/edit') }}/{{ $todo->id }}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{ url('/todo/delete') }}/{{ $todo->id }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                            <td></td>
                        </tr>
                    @empty

                    @endforelse
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h1>Todo List</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/todo/insert') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">What to do</label>
                                <input type="text" name="todo" class="form-control">
                            </div>
                            @error('todo')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>

                            @enderror
                            <div class="form-group">
                                <label for="">When to do</label>
                                <input type="date" name="when" class="form-control">
                            </div>
                            @error('when')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>

                            @enderror
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="sl-pagebody">

    </div>
</div> --}}
@endsection
