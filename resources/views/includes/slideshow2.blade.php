<section class="section-margin calc-60px">
  <div class="container">
    <div class="section-intro pb-60px">
      <p>Popular Item in the market</p>
      <h2>Best <span class="section-intro__style">Sellers</span></h2>
    </div>
    <div class="owl-carousel owl-theme" id="bestSellerCarousel">
      @foreach($featureproducts as $item)
      <!-- form add product to cart -->
      <form action="{{ route('productcart') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $item->pid }}">
        <input type="hidden" name="name" value="{{ $item->pname }}">
        <input type="hidden" name="price" value="{{ $item->pprice }}">
        <input type="hidden" name="image" value="{{ $item->pimg }}">
        <input type="hidden" name="quantity" value="1" />

        <div class="card text-center card-product">
          <div class="card-product__img">
            <img class="img-fluid" src="img/product/{{$item->pimg}}" alt="">
            <ul class="card-product__imgOverlay">
              <li>
                <button>
                  <i class="ti-search"></i>
                </button>
              </li>
              <li>
                <button>
                  <a href="#" type="submit">
                    <i class="ti-shopping-cart"></i>
                  </a>
                </button>
              </li>
              <li>
                <button>
                  <i class="ti-heart"></i>
                </button>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <h3>{{$item->pname}}</h3>
            <p class="card-product__title"><a href="single-product.html">{{$item->pdescription}}</a></p>
            <p class="card-product__price">${{$item->pprice}}</p>
          </div>
        </div>
      </form>
      @endforeach
    </div>
  </div>
</section>

<section class="blog">
  <div class="container">
    <div class="section-intro pb-60px">
      <p>Popular Item in the market</p>
      <h2>Latest <span class="section-intro__style">News</span></h2>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog">
          <div class="card-blog__img">
            <img class="card-img rounded-0" src="img/blog/blog1.png" alt="">
          </div>
          <div class="card-body">
            <ul class="card-blog__info">
              <li><a href="#">By Admin</a></li>
              <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
            </ul>
            <h4 class="card-blog__title"><a href="single-blog.html">The Richland Center Shooping News and weekly shooper</a></h4>
            <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
            <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog">
          <div class="card-blog__img">
            <img class="card-img rounded-0" src="img/blog/blog2.png" alt="">
          </div>
          <div class="card-body">
            <ul class="card-blog__info">
              <li><a href="#">By Admin</a></li>
              <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
            </ul>
            <h4 class="card-blog__title"><a href="single-blog.html">The Shopping News also offers top-quality printing services</a></h4>
            <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
            <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="card card-blog">
          <div class="card-blog__img">
            <img class="card-img rounded-0" src="img/blog/blog3.png" alt="">
          </div>
          <div class="card-body">
            <ul class="card-blog__info">
              <li><a href="#">By Admin</a></li>
              <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
            </ul>
            <h4 class="card-blog__title"><a href="single-blog.html">Professional design staff and efficient equipment you’ll find we offer</a></h4>
            <p>Let one fifth i bring fly to divided face for bearing divide unto seed. Winged divided light Forth.</p>
            <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>