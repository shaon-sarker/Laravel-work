@extends('layouts.app')
{{-- @section('subcategory')
active
@endsection --}}
@section('content')
{{-- @include('layouts.nav') --}}
<div class="sl-mainpanel">
    {{-- <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Dasboad</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
    </nav> --}}
<div class="sl-pagebody">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Todolist</h3>
                    </div>
                    <div class="card-body">
                        @if (session('update'))
                            <div class="alert alert-info">
                                {{ session('update') }}
                            </div>
                        @endif
                       <form action="{{url('/todo/update')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $todo_edit->id }}" name="id">
                        <div class="form-group">
                            <label for="" class="form-label">What to do</label>
                            <input type="text" name="todo" class="form-control" value="{{ $todo_edit->todo  }}">
                        </div>
                        <div class="form-group">
                              <label for="" class="form-label">When to do</label>
                               <input type="date" name="when" class="form-control" value="{{ $todo_edit->when }}">
                        </div>
                               <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
