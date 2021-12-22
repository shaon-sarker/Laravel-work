@extends('layouts.app')
@section('content')
  <div class="container mt-5">


  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

  <div class="card">

    <div class="card-header font-weight-bold">
      <h2 class="float-left">Import Export Excel, CSV File In Laravel 8</h2>
      <h2 class="float-right"><a href="{{ route('export') }}" class="btn btn-success mr-1">Export Excel</a><a href="{{ route('export') }}" class="btn btn-success">Export CSV</a></h2>
    </div>

    <div class="card-body">

        <form id="import-csv-form" method="POST"  action="{{ url('import') }}" accept-charset="utf-8" enctype="multipart/form-data">

          @csrf

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">

                        <input type="file" name="file" class="form-control" placeholder="Choose file">
                    </div>
                    @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>
            <div class="row">

                <div class="col-md-10">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user_info)
                                <tr>
                                    <td>{{ $user_info->id  }}</td>
                                    <td>{{ $user_info->name }}</td>
                                    <td>{{ $user_info->email }}</td>
                                    <td>
                                        <a href="" class="btn btn-info">View</a>
                                        <a href="" class="btn btn-success">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty

                            @endforelse

                        </tbody>
                    </table>
                        {{ $users->links() }}
                </div>
            </div>
        </form>

    </div>

  </div>

</div>
@endsection
