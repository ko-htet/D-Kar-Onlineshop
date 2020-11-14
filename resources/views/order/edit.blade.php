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
          <h2>Item Edit Form</h2>
          <form method="POST" action="{{ route('item.update',$item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Name:</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name }}">
              @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="form-group">
              <label>Price:</label>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Current Price</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Discount Price</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <input type="text" class="form-control mt-2" name="price" value="{{ number_format($item->price) }}">
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="text" class="form-control mt-2" name="discount" value="{{ number_format($item->discount) }}">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label>Description:</label>
              <input type="text" name="description" class="form-control @error('name') is-invalid @enderror" value="{{ $item->description }}">
              @error('name')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="form-group">
              <label>Brand:</label>
              <select class="custom-select" name="brand_id">
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @if($brand->id == $item->brand_id) {{'selected'}} @endif>{{ $brand->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select class="custom-select" name="category_id">
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Subcategory:</label>
              <select class="custom-select" name="subcategory_id">
                  @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" @if($subcategory->id == $item->subcategory_id) {{'selected'}} @endif>{{ $subcategory->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Photo: (<small class="text-danger"> * jpg, jpeg, bmp, png</small>)</label>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                 <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#old" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>
                  </li>
                  <li class="nav-item" role="presentation">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
                  </li>
              </ul>
              <div class="tab-content mt-3" id="myTabContent">
                  <div class="tab-pane fade show active" id="old" role="tabpanel" aria-labelledby="home-tab">
                    <img src="{{ asset($item->photo) }}" class="img-fluid" alt="">
                    <input type="hidden" name="oldphoto" value="{{ $item->photo }}">
                  </div>
                  <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
                    @error('photo')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                  </div>
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