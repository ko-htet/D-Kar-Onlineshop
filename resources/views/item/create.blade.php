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
          <h2>Item Create Form</h2>
          <form method="POST" action="{{route('item.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Name:</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Item name..." value="{{ old('name') }}">
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
                    <input type="text" class="form-control mt-2" name="price" value="0">
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="text" class="form-control mt-2" name="discount" value="0">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label>Description:</label>
              <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Item Detail Description..." value="{{ old('description') }}">
              @error('description')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="form-group">
              <label>Brand:</label>
              <select class="form-control" name="brand_id">
                  <option selected>Choose Brand</option>
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Category:</label>
              <select class="form-control category" name="category_id">
                <option selected>Choose Category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Subcategory:</label>
              <select class="form-control subcategory subcategory_option" name="subcategory_id" disabled="true">
              <option selected>Choose Subcategory</option>
                  @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Photo: (<small class="text-danger"> jpg, jpeg, bmp, png</small>)</label>
              <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
              @error('photo')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            <div class="form-group">
              <input type="submit" name="btnsubmit" value="Save" class="btn btn-info">
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.category').change(function(){
        let categoryid = $(this).val();
        $.post("{{ route('filterCategory') }}", {cid:categoryid}, function(response){
          var html = "";
          for(let row of response){
            html += `<option value="${row.id}">${row.name}</option>`;
          }
          $('.subcategory').prop('disabled', false);
          $('.subcategory_option').html(html);
        })
      })
    })
  </script>
@endsection