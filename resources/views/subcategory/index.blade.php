@extends('backendtemplate')
@section('title', 'Subcategory')
@section('content')

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="d-inline-block">Subcategory List</h2>
          <a href="{{route('subcategory.create')}}" class="btn btn-success float-right">Add New</a>
          <table class="table table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($subcategories as $row)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$row->name}}</td>
                <td>
                  <a href="{{route('subcategory.edit', $row->id)}}" class="btn btn-warning">Edit</a>
                  <a href="{{route('subcategory.show', $row->id)}}" class="btn btn-info mx-1">Show</a>
                  <form method="POST" action="{{ route('subcategory.destroy', $row->id) }}" class="d-inline-block" 
                   onsubmit="return confirm('Are you sure to delete?')">
                   @csrf
                   @method('DELETE')
                    <input type="submit" class="btn btn-danger" name="btnsubmit" value="Delete">
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('backend_asset/js/plugins/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('backend_asset/js/plugins/dataTables.bootstrap.min.js') }}"></script>
  <script type="text/javascript">$('.dataTable').DataTable();</script>
@endsection