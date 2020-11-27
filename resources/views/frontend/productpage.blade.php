@extends('frontendtemplate')
@section('title', 'Product_Page')
@section('content')
<div class="products-catagories-area section-padding-100 clearfix">
    <div class="container">
        <h2 class="my-5">All Products</h2>
        <div class="row">
            @foreach($items as $item)
            <!-- Single Product Area -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <x-item-component :item="$item"></x-item-component>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection