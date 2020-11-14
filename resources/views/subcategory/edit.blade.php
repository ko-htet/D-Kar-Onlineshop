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
          <h2>Subcategory Edit Form</h2>
          <form method="POST" action="{{ route('subcategory.update',$subcategory->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Name:</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $subcategory->name }}">
              @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>

            <div class="form-group">
              <label>Category:</label>
              <select class="custom-select" name="category_id">
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" @if($category->id == $subcategory->category_id) {{'selected'}} @endif>{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-info" name="btnsubmit" value="Update">
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection