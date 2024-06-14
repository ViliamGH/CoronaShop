<section class="section-margin calc-60px">
  <div class="container">
    <div class="section-intro pb-60px">
      <p>Popular Item in the market</p>
      <h2>Trending <span class="section-intro__style">Product</span></h2>
    </div>
    <div class="row">
      @foreach($slideshows as $item)
      <div class="col-md-6 col-lg-4 col-xl-3">
        @if($loop->first)
        <div class="card text-center card-product active">
          @else
          <div class="card text-center card-product">
            @endif
            <div class="card-product__img">
              <img class="card-img" src="imgs/slideshows/{{$item->img}}" alt="">
              <ul class="card-product__imgOverlay">
                <li><button><i class="ti-search"></i></button></li>
                <li><button><i class="ti-shopping-cart"></i></button></li>
                <li><button><i class="ti-heart"></i></button></li>
              </ul>
            </div>
            <div class="card-body">
              <p>{{$item->title}}</p>
              <h4 class="card-product__title"><a href="single-product.html">{{$item->subtitle}}</a></h4>
              <p class="card-product__price">{{$item->text}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>