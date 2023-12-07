<div class="container" id="appendCartItems">
    <div class="page-title text-center">
        <h1>Shopping Cart</h1>
    </div>
    <div class="row">
        <div class="col-lg-11 col-xl-13">
            <div class="cart-table">
                <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                    <div class="cart-table-prd-image text-center">
                        Image
                    </div>
                    <div class="cart-table-prd-content-wrap">
                        <div class="cart-table-prd-info">Name</div>
                        <div class="cart-table-prd-qty">Qty</div>
                        <div class="cart-table-prd-price">Price</div>
                        <div class="cart-table-prd-action">&nbsp;</div>
                    </div>
                </div>
                @php $total_price = 0; @endphp
                @foreach($getCartItems as $items)
                <div class="cart-table-prd">
                    <div class="cart-table-prd-image">
                        <a href="{{ url('product_detail', $items['product']['id'])}}" class="prd-img">
                        <img class="lazyload fade-up" src="{{ asset('uploads/products/featuredImages/large/'.$items['product']['featured_image'])}}" data-src="{{ asset('uploads/products/featuredImages/large/'.$items['product']['featured_image'])}}" alt=""></a>
                    </div>
                    <div class="cart-table-prd-content-wrap">
                        <div class="cart-table-prd-info">
                            {{-- <div class="cart-table-prd-price">
                                <div class="price-new">{{ $items['product']['selling_price']}}</div>
                            </div> --}}
                            <h1 class="cart-table-prd-name" style="font-size: 20px;"><a href="{{ url('product_detail', $items['product']['id'])}}">{{ $items['product']['name']}}</a></h1>
                            <h3 class="cart-table-prd-name"><span>Brand :{{ $items['product']['brands']['name']}}</span></h3>
                            <h3 class="cart-table-prd-name"><span>Size :{{ $items['product']['sizes']['name']}}</span></h3>
                            <h3 class="cart-table-prd-name"><span>Color :{{ $items['product']['colors']['name']}}</span></h3>
                        </div>
                        <div class="cart-table-prd-qty">
                            <div class="prd-block_qty">
                                <div class="qty qty-changer">
                                    <button class="decrease updateCartItem qtyMinus js-qty-button" data-cartid="{{ $items['id']}}" data-qty = "{{ $items['product_quantity']}}"></button>
                                    <input type="number" class="qty-input" name="quantity" value="{{ $items['product_quantity']}}" data-min="1" data-max="1000">
                                    <button class="increase updateCartItem qtyPlus js-qty-button" data-cartid="{{ $items['id']}}" data-qty = "{{ $items['product_quantity']}}"></button>
                                </div>
                            </div>
                        </div>
                        <div class="cart-table-prd-price-total">
                            ${{ $items['product']['selling_price']*$items['product_quantity']}}
                        </div>
                    </div>
                    <div class="cart-table-prd-action">
                        <a href="javascript:;" class="cart-table-prd-remove deleteCartitem" data-cartid="{{ $items['id']}}"  data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                    </div>
                </div>
                @php $total_price = $total_price + ($items['product']['selling_price'] * $items['product_quantity'])  @endphp
                @endforeach
            </div>
            <div class="d-none d-lg-block">
                <div class="mt-4"></div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-5 mt-3 mt-md-0 p-0">
            <div class="card-total">
                <div class="d-block mb-1">Price Details (1 item)</div>
                <div class="row d-flex flex-wrap mt-0 justify-content-between total-sec">
                    <div class="col-9 card-total-txt  ">Total MRP</div>
                    <div class="col-auto card-total-price text-right  col-9">${{ $total_price}}</div>
                    <div class="col-9 card-total-txt  ">Discount on MRP</div>
                    <div class="col-auto card-total-price text-right col-9 text-success">- $0.00</div>
                    <div class="col-9 card-total-txt  mt-0">Coupon Discount</div>
                    <div class="col-auto card-total-price text-right  col-9"><a href="javascript:;" class="card-total-price2 text-success"> - $0.00</a></div>
                </div>
                <div class="row d-flex flex-wrap mt-0 justify-content-between total-amt">
                    <div class="col-9 card-total-txt  mt-0">Total Amount</div>
                    <div class="col-auto card-total-price text-right  col-9">${{ $total_price}}</div>
                </div>
                <a href="{{ route('checkout')}}" class="btn btn--full btn--lg"><span>Checkout</span></button></a>
            </div>
            <div class="mt-2"></div>
        </div>
    </div>
</div>