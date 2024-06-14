@extends("layouts.categorystore")
@section("products")
<!-- product_1 -->
<section class="related-product-area">
    <div class="container">
        <div class="section-intro pb-60px mt-5">
            <p>Popular Item in the market</p>
            <h2>Top <span class="section-intro__style">Product</span></h2>
        </div>
        <div class="row mt-30">
            @foreach($featureproducts as $item)
            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <div class="single-search-product-wrapper">
                    <div class="single-search-product d-flex">
                        <a href="#"><img src="img/product/product-sm-1.png" alt=""></a>
                        <div class="desc">
                            <a href="#" class="title">{{$item->pname}}</a>
                            <div class="price">${{$item->pprice}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- product_2 -->
<section class="section-margin--small mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Categories</div>
                    @foreach($categories as $item)
                    <ul class="main-categories">
                        <li class="common-filter">
                            <form action="#">
                                <ul>
                                    <li class="filter-list"><input class="pixel-radio" type="radio" id="men" name="brand"><label for="men"> {{$item->cdescription}} </label></li>
                                </ul>
                            </form>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div>
                        <div class="input-group filter-bar-search">
                            <input type="text" placeholder="Search">
                            <div class="input-group-append">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @foreach($featureproducts as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    <img class="card-img" src="img/product/{{$item->pimg}}" alt="">
                                    <ul class="card-product__imgOverlay">
                                        <li><button><i class="ti-search"></i></button></li>
                                        <li><button><i class="ti-shopping-cart"></i></button></li>
                                        <li><button><i class="ti-heart"></i></button></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <p>{{$item->pname}}</p>
                                    <h4 class="card-product__title"><a href="#">{{$item->pdescription}}</a></h4>
                                    <p class="card-product__price">${{$item->pprice}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
</section>
@endsection