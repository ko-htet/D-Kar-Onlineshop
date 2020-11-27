@extends('frontendtemplate')
@section('title', 'Home_Page')
@section('content')

        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$items[0]->photo}}" class="img-fluid" style="height:450px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$items[0]->name}}</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$brands[0]->photo}}" class="img-fluid" style="height:400px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$brands[0]->name}}</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$categories[0]->photo}}" class="img-fluid" style="height:350px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$categories[0]->name}}</h4>
                        </div>
                    </a>
                </div>

                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$items[1]->photo}}" class="img-fluid" style="height:450px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$items[1]->name}}</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$categories[1]->photo}}" class="img-fluid" style="height:350px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$categories[1]->name}}</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$brands[1]->photo}}" class="img-fluid" style="height:400px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$brands[1]->name}}</h4>
                        </div>
                    </a>
                </div>

                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$items[2]->photo}}" class="img-fluid" style="height:450px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$items[2]->name}}</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$brands[2]->photo}}" class="img-fluid" style="height:400px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$brands[2]->name}}</h4>
                        </div>
                    </a>
                </div>
                <div class="single-products-catagory shadow-sm p-3 mb-5 bg-white rounded clearfix">
                    <a href="shop.html">
                        <img src="{{$categories[2]->photo}}" class="img-fluid" style="height:350px; border-radius: 50%;">
                        <div class="hover-content p-2 rounded">
                            <div class="line"></div>
                            <h4>{{$categories[2]->name}}</h4>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>

@endsection