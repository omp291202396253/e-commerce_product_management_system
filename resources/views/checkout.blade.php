@extends('frontendlayouts.header')

@section('content')

<style>
    .aa-browse-btn{
        width: 100% !important;
    }
</style>
<section id="checkout">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
         <div class="checkout-area">
            <form action="{{ route('save_checkout') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout-left">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default aa-checkout-billaddress">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                Order Details
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" name="first_name" placeholder="First Name*" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" name="last_name" placeholder="Last Name*" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="email" name="email" placeholder="Email Address*" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="aa-checkout-single-bill">
                                                        <textarea name="address" cols="8" rows="3" placeholder="Address*" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" name="city" placeholder="City / Town*" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="aa-checkout-single-bill">
                                                        <input type="text" name="postcode" placeholder="Postcode / ZIP*" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Order Summary -->
                    <div class="col-md-4">
                        <div class="checkout-right">
                            <h4>Order Summary</h4>
                            <div class="aa-order-summary-area">
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartData as $item)
                                            <tr>
                                                <td>{{ $item['product_name'] }} <strong> x {{ $item['quantity'] }}</strong></td>
                                                <td>₹{{ $item['total'] }}</td>
                                            </tr>
                                            <input type="hidden" name="products[]" value="{{ json_encode($item) }}">
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <td>₹{{ $grandTotal }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <input type="hidden" name="grand_total" value="{{ $grandTotal }}">
                            <input type="submit" value="Place Order" class="aa-browse-btn">
                        </div>
                    </div>
                </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection