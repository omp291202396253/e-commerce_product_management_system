@extends('frontendlayouts.header')

@section('content')

  <section id="aa-popular-category">
    <h2 id="our-category">Our Products</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <div class="tab-content">
                <div class="tab-pane fade in active">
                  <ul class="aa-product-catg aa-popular-slider">
                    @if(count($sProduct) > 0)
                        @foreach($sProduct as $products)
                            <li>
                            <figure>
                                <a class="aa-product-img" href="#"><img src="{{ asset($products->image) }}" alt="Product Image" width="250" height="300"></a>
                                <form action="{{ route('add_to_cart') }}" method="POST">
                                  @csrf
                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <button type="submit" class="aa-add-card-btn">
                                        <span class="fa fa-shopping-cart"></span> Add To Cart
                                    </button>
                                  </form>
                                <figcaption>
                                <h4 class="aa-product-title"><a href="#">{{ $products->product_name }}</a></h4>
                                <span class="aa-product-price">₹{{ $products->price }}</span>
                                </figcaption>
                            </figure>             
                            
                            </li>
                        @endforeach                
                    @else 
                        <li>
                            <figure>
                            <a class="aa-product-img" href="#"><img src="{{ asset('frontendassets/img/man/t-shirt-1.png') }}" alt="polo shirt img"></a>
                            <figcaption>
                                <h4 class="aa-product-title"><a href="#">No Data Available</a></h4>
                            </figcaption>
                            </figure>                         
                        </li>
                    @endif
                  </ul>
                </div>
                    
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  @endsection