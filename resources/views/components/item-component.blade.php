                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="{{$item->photo}}" class="img-fluid" alt="">
                        <div class="hoverDetail">
                            <a href="{{ route('itemdetail', $item->id) }}" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="left" title="Detail"><i class="fa fa-info-circle fa-2x rounded" aria-hidden="true"></i></a>
                            <a href="" class="btn btn-outline-warning mx-3" data-toggle="tooltip" data-placement="right" title="View"><i class="fa fa-eye fa-2x rounded" aria-hidden="true"></i></a>
                        </div>
                        <!-- Hover Thumb -->
                        <!-- <img class="hover-img" src="{{asset('my_asset/img/product-img/product2.jpg')}}" alt=""> -->
                    </div>

                    <!-- Product Description -->
                    <div class="product-description d-flex align-items-center justify-content-between">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            @if($item->discount > 0)
                            <p class="product-price" style="font-size:20px;">{{number_format($item->discount)}} MMK <small style="font-size:12px;"><strike class="text-danger pl-1">({{number_format($item->price)}} MMK)</strike></small></p>
                            @else
                            <p class="product-price" style="font-size:20px;">{{number_format($item->price)}} MMK</p>
                            @endif
                            <a href="product-details.html">
                                <h6>{{$item->name}}</h6>
                            </a>
                        </div>
                        <!-- Ratings & Cart -->
                        <div class="ratings-cart text-right mr-1">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="cart">
                                <a href="{{ route('itemdetail', $item->id) }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Detail"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                <button type="submit" class="btn btn-outline-secondary atc" data-id="{{ $item->id }}"
                                    data-name="{{ $item->name }}" data-photo="{{ $item->photo }}" data-price="{{ $item->price }}"
                                    data-discount="{{ $item->discount }}" data-toggle="tooltip" data-placement="right" title="Add to Cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                <!-- <a href="cart.html" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="{{asset('my_asset/img/core-img/cart.png')}}" alt=""></a> -->
                            </div>
                        </div>
                    </div>
                </div>