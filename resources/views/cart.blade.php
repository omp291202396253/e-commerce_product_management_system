@extends('frontendlayouts.header')

@section('content')

<style>
    .cart-view-total h4{
        text-align: center !important;
    }

    .aa-cart-view-btn{
        float: none !important;
        margin-top: 10px;
    }
</style>

<section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif  
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($sCart) > 0)
                                @foreach($sCart as $cart)
                                    <tr class="cart-row">
                                        <td>
                                            <a class="remove" href="{{ route('remove_cart', ['id'=>$cart->cart_id])}}">
                                                <fa class="fa fa-close"></fa>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img src="{{ asset($cart->image) }}" style="width: 50px;height: 50px;" alt="img">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="aa-cart-title" href="#">{{ $cart->product_name }}</a>
                                        </td>
                                        <td class="product-price">₹{{ $cart->price }}</td>
                                        <td>
                                            <input class="aa-cart-quantity" type="number" min="1" value="1" 
                                                   data-price="{{ $cart->price }}" onchange="updateTotal(this)">
                                        </td>
                                        <td class="product-total">₹{{ $cart->price }}</td>
                                    </tr>
                                @endforeach
                            @else 
                                <tr>
                                    <td colspan="6" class="text-center">No Data Available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <!-- Cart Total view -->
                <div class="cart-view-total">
                    <h4>Cart Totals</h4>
                    <table class="aa-totals-table">
                        <tbody>
                            <tr>
                                <th>Total</th>
                                <td id="grand-total">₹0</td>  <!-- This will be updated dynamically -->
                            </tr>
                        </tbody>
                    </table>
                    <form id="checkout-form" action="{{ route('checkout') }}" method="GET">
                        <input type="hidden" name="cart_data" id="cart-data">
                        <input type="hidden" name="grand_total" id="grand-total-input">
                        <button type="submit" class="aa-cart-view-btn">Proceed to Checkout</button>
                    </form>                    
                </div>                
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <script>
    function updateTotal(input) {
        let quantity = parseInt(input.value);
        let price = parseFloat(input.getAttribute('data-price'));

        if (isNaN(quantity) || quantity < 1) {
            quantity = 1;
            input.value = 1;
        }

        let row = input.closest('.cart-row');
        let totalCell = row.querySelector('.product-total');
        let newTotal = price * quantity;

        totalCell.textContent = '₹' + newTotal.toFixed(2);

        updateGrandTotal();
    }

    function updateGrandTotal() {
        let total = 0;
        let cartItems = [];

        document.querySelectorAll('.cart-row').forEach(row => {
            let cartId = row.querySelector('.remove').getAttribute('href').split('id=')[1];
            let productName = row.querySelector('.aa-cart-title').textContent.trim();
            let quantity = row.querySelector('.aa-cart-quantity').value;
            let price = parseFloat(row.querySelector('.product-price').textContent.replace('₹', ''));
            let totalPrice = parseFloat(row.querySelector('.product-total').textContent.replace('₹', ''));

            total += totalPrice;

            cartItems.push({
                cart_id: cartId,
                product_name: productName,
                quantity: quantity,
                price: price,
                total: totalPrice
            });
        });

        document.getElementById('grand-total').textContent = '₹' + total.toFixed(2);
        document.getElementById('grand-total-input').value = total.toFixed(2);
        document.getElementById('cart-data').value = JSON.stringify(cartItems);
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateGrandTotal();
    });
</script>

@endsection