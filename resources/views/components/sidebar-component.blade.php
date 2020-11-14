        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <div class="accordion" id="accordionExample">
                        @php $j = 1; @endphp
                        @foreach($categories as $category)
                        <div class="card border-0">
                            <div class="card-header border-0" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn text-left text-muted" type="button" data-toggle="collapse" data-target="#collapseOne{{$j}}" aria-expanded="true" aria-controls="collapseOne{{$j}}" style="background-color:#F5F7FA;">
                                {{$category->name}}
                                </button>
                            </h2>
                            </div>

                            <div id="collapseOne{{$j}}" class="collapse border-0" aria-labelledby="headingOne" data-parent="#accordionExample" style="background-color:#F5F7FA;">
                                <div class="card-body">
                                    @foreach($category->subcategories as $subcategory)
                                    <a href="{{route('itemsbysubcategory', $subcategory->id)}}" class="btn btn-link text-muted">{{$subcategory->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @php $j++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget brands mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Brands</h6>

                <div class="widget-desc">
                    @foreach($mybrand as $brand)
                    <div class="">
                        <a href="{{route('itemsbybrand', $brand->id)}}" class="btn btn-link text-muted">{{$brand->name}}</a>
                    </div>
                    @endforeach

                    <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="ikea">
                        <label class="form-check-label" for="ikea">Ikea</label>
                    </div> -->
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <!-- <div class="widget color mb-50">
                <h6 class="widget-title mb-30">Color</h6>

                <div class="widget-desc">
                    <ul class="d-flex">
                        <li><a href="#" class="color1"></a></li>
                        <li><a href="#" class="color2"></a></li>
                        <li><a href="#" class="color3"></a></li>
                        <li><a href="#" class="color4"></a></li>
                        <li><a href="#" class="color5"></a></li>
                        <li><a href="#" class="color6"></a></li>
                        <li><a href="#" class="color7"></a></li>
                        <li><a href="#" class="color8"></a></li>
                    </ul>
                </div>
            </div> -->

            <!-- ##### Single Widget ##### -->
            <div class="widget price mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Price</h6>

                <div class="widget-desc">
                    <div class="slider-range">
                        <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="range-price">$10 - $1000</div>
                    </div>
                </div>
            </div>
        </div>