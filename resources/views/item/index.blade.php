@extends('backendtemplate')
@section('title', 'Item')
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
          <h2 class="d-inline-block">Item List</h2>
          <a href="{{route('item.create')}}" class="btn btn-success float-right">Add New</a>
          <table class="table table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Code no:</th>
                <th>Price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach($items as $row)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->codeno }}</td>
                <td>
                  @if($row->discount > 0)
                    <strike class="text-danger mr-3">{{number_format($row->price)}} MMK </strike><span>{{number_format($row->discount)}} MMK</span>
                  @else
                    {{number_format($row->price)}} MMK
                  @endif
                </td>
                <td>
                  <a href="{{route('item.edit', $row->id)}}" class="btn btn-warning">Edit</a>
                  <a href="{{route('item.show', $row->id)}}" class="btn btn-info mx-1">Show</a>
                  <form method="POST" action="{{ route('item.destroy', $row->id) }}" class="d-inline-block" 
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