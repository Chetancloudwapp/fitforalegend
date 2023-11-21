@extends('front.layout.master')
@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="home.html">Home</a></li>
                <li><span>Cart</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
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
                        <div class="cart-table-prd">
                            <div class="cart-table-prd-image">
                                <a href="product.html" class="prd-img">
                                <img class="lazyload fade-up" src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-16-1.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-16-1.webp" alt=""></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <div class="cart-table-prd-price">
                                        <div class="price-new">$220.00</div>
                                    </div>
                                    <h2 class="cart-table-prd-name"><a href="product.html">Cascade Casual Shirt</a></h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="prd-block_qty">
                                        <div class="qty qty-changer">
                                            <button class="decrease js-qty-button"></button>
                                            <input type="number" class="qty-input" name="quantity" value="1" data-min="1" data-max="1000">
                                            <button class="increase js-qty-button"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    $360.00
                                </div>
                            </div>
                            <div class="cart-table-prd-action">
                                <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                            </div>
                        </div>
                        <div class="cart-table-prd">
                            <div class="cart-table-prd-image">
                                <a href="product.html" class="prd-img"><img class="lazyload fade-up" src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-1.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-1.webp" alt=""></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <div class="cart-table-prd-price">
                                        <div class="price-new">$75.00</div>
                                    </div>
                                    <h2 class="cart-table-prd-name"><a href="product.html">Oversize Cotton Dress</a></h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="prd-block_qty">
                                        <div class="qty qty-changer">
                                            <button class="decrease js-qty-button"></button>
                                            <input type="number" class="qty-input" name="quantity" value="1" data-min="1" data-max="1000">
                                            <button class="increase js-qty-button"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    $360.00
                                </div>
                            </div>
                            <div class="cart-table-prd-action">
                                <a href="#" class="cart-table-prd-remove" data-tooltip="Remove Product"><i class="icon-recycle"></i></a>
                            </div>
                        </div>
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
                            <div class="col-auto card-total-price text-right  col-9">$ 475.00</div>
                            <div class="col-9 card-total-txt  ">Discount on MRP</div>
                            <div class="col-auto card-total-price text-right col-9 text-success">- $110.00</div>
                            <div class="col-9 card-total-txt  mt-0">Coupon Discount</div>
                            <div class="col-auto card-total-price text-right  col-9"><a href="javascript:;" class="card-total-price2 text-success"> - $110.00</a></div>
                        </div>
                        <div class="row d-flex flex-wrap mt-0 justify-content-between total-amt">
                            <div class="col-9 card-total-txt  mt-0">Total Amount</div>
                            <div class="col-auto card-total-price text-right  col-9">$420.00</div>
                        </div>
                        <a href="checkout.html" class="btn btn--full btn--lg"><span>Checkout</span></button></a>
                    </div>
                    <div class="mt-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection