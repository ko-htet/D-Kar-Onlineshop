@extends('frontendtemplate')
@section('title', 'Home_Page')
@section('content')

        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('storage/slid_img/1.png')}}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('storage/slid_img/2.png')}}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('storage/slid_img/3.png')}}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

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
        </div>

@endsection