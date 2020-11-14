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
      <div class="col">
        <div class="tile">
          <div class="row">
            <div class="col-4">
              <img src="{{ asset($item->photo) }}" class="img-fluid" alt="">
            </div>
            <div class="col-8">
              <h2 class="my-3">Item Detail</h2>
              <div class="my-3">
                <span class="text-uppercase mr-2"> name: </span>
                <span>{{ $item->name }}</span>
              </div>
              <div class="my-3">
                <span class="text-uppercase mr-2"> codeno: </span>
                <span>{{ $item->codeno }}</span>
              </div>
              <div class="my-3">
                <span class="text-uppercase mr-2"> price: </span>
                <span>{{ number_format($item->price) }} MMK</span>
              </div>
              <div class="my-3">
                <span class="text-uppercase mr-2"> discount: </span>
                <span>{{ number_format($item->discount) }} MMK</span>
              </div>
              <div class="my-3">
                <span class="text-uppercase mr-2"> description: </span>
                <span>{{ $item->description }}</span>
              </div>
              <div class="my-3">
                <span class="text-uppercase mr-2"> brand: </span>
                <span>{{ $item->brand->name }}</span>
              </div>
              <div class="my-3">
                <span class="text-uppercase mr-2"> subcategory: </span>
                <span>{{ $item->subcategory->name }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection