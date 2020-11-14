@extends('backendtemplate')
@section('title', 'Category')
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
      <div class="col">
        <div class="tile">
          <div class="row">
            <div class="col-4">
              <img src="{{ asset($category->photo) }}" class="img-fluid" alt="">
            </div>
            <div class="col-8">
              <h2 class="my-3">Category Detail</h2>
              <span class="text-uppercase mr-3">Category name: </span>
              <span>{{ $category->name }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection