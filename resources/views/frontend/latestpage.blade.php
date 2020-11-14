@extends('frontendtemplate')
@section('title', 'Latest_Product')
@section('content')
<div class="products-catagories-area section-padding-100 clearfix">
    <div class="container">
        <h2 class="my-5">Latest Products</h2>
        <div class="row">
            @foreach($items as $item)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <x-item-component :item="$item"></x-item-component>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection