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
      <div class="col">
        <div class="tile">
          <h2 class="py-3 mb-3">Subcategory Detail</h2>
          <div class="my-3">
            <span class="text-uppercase mr-3">Subcategory name: </span>
            <span>{{ $subcategory->name }}</span>
          </div>
          <div class="my-3">
            <span class="text-uppercase mr-3">Category id: </span>
            <span>{{ $subcategory->category->name }}</span>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection