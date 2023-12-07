@extends('front.layout.master')
@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('home')}}">Home</a></li>
                <li><span>Checkout</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <h1 class="text-center">Checkout wizard</h1>
            <div class="row">
                <div class="col-md-10">
                    <div class="steps-progress">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#step1" data-step="1"><span>01.</span><span>Shipping Address</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#step2" data-step="2"><span>02.</span><span>Billing Address</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#step4" data-step="4"><span>03.</span><span>Payment Method</span></a>
                            </li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 25%;"></div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="step1">
                            <div class="tab-pane-inside">
                                <div class="clearfix mr-1">
                                    <input id="formcheckoutRadios" value="" name="radio22" type="radio" class="radio" checked>
                                    <label for="formcheckoutRadios" class="pick">In Store Pick Up</label>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-sm step-next">Continue</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="step2">
                            <div class="tab-pane-inside">
                                <!--<div class="clearfix">-->
                                <!--	<input id="formcheckoutCheckbox2" name="checkbox2" type="checkbox">-->
                                <!--	<label for="formcheckoutCheckbox2">The same as shipping address</label>-->
                                <!--</div>-->
                                <div class="mt-2"></div>
                                <label>Country:</label>
                                <div class="form-group select-wrapper">
                                    <select class="form-control form-control--sm">
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="India">India</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Mexico">Mexico</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <label>State:</label>
                                        <div class="form-group select-wrapper">
                                            <select class="form-control form-control--sm">
                                                <option value="AL">Alabama</option>
                                                <option value="AK">Alaska</option>
                                                <option value="AZ">Arizona</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="CA">California</option>
                                                <option value="CO">Colorado</option>
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="DC">District Of Columbia</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="HI">Hawaii</option>
                                                <option value="ID">Idaho</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IN">Indiana</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>zip/postal code:</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control--sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2"></div>
                                <label>Address :</label>
                                <div class="form-group">
                                    <!--<input type="text" class="form-control form-control--sm">-->
                                    <textarea row="7" class="form-control form-control--sm"></textarea>
                                </div>
                                <div class="mt-2"></div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-sm step-next">Continue</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="step4">
                            <div class="tab-pane-inside">
                                <div class="d-flex flex-wrap">
                                    <div class="clearfix mr-1">
                                        <input id="formcheckoutRadio4" value="" name="radio2" type="radio" class="radio" checked="checked">
                                        <label for="formcheckoutRadio4">Credit Card</label>
                                    </div>
                                    <div class="clearfix mr-1">
                                        <input id="formcheckoutRadio6" value="" name="radio2" type="radio" class="radio">
                                        <label for="formcheckoutRadio6">Debit Card</label>
                                    </div>
                                    <div class="clearfix mr-1" >
                                        <input id="formcheckoutRadio5" value="" name="radio2" type="radio" class="radio">
                                        <label for="formcheckoutRadio5"> Apple Pay</label>
                                    </div>
                                    <div class="clearfix mr-1">
                                        <input id="formcheckoutRadio7" value="" name="radio2" type="radio" class="radio">
                                        <label for="formcheckoutRadio7">Google Pay</label>
                                    </div>
                                    <!--<span class="mr-1">and</span>-->
                                    <div class="clearfix mr-1">
                                        <input id="formcheckoutRadio8" value="" name="radio2" type="radio" class="radio">
                                        <label for="formcheckoutRadio8">After Pay</label>
                                    </div>
                                    <!--<div class="clearfix">-->
                                    <!--	<input id="formcheckoutRadio8" value="" name="radio2" type="radio" class="radio">-->
                                    <!--	<label for="formcheckoutRadio8">Paypal</label>-->
                                    <!--</div>-->
                                </div>
                                <div class="mt-2"></div>
                                <label>Cart Number</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control--sm">
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <label>Month:</label>
                                        <div class="form-group select-wrapper">
                                            <select class="form-control form-control--sm">
                                                <option selected value='1'>January</option>
                                                <option value='2'>February</option>
                                                <option value='3'>March</option>
                                                <option value='4'>April</option>
                                                <option value='5'>May</option>
                                                <option value='6'>June</option>
                                                <option value='7'>July</option>
                                                <option value='8'>August</option>
                                                <option value='9'>September</option>
                                                <option value='10'>October</option>
                                                <option value='11'>November</option>
                                                <option value='12'>December</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>Year:</label>
                                        <div class="form-group select-wrapper">
                                            <select class="form-control form-control--sm">
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2"></div>
                                <label>CVV Code</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control--sm">
                                </div>
                            </div>
                            <div class="clearfix mt-1 mt-md-2">
                                <button type="submit" class="btn btn--lg w-100">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 pl-lg-8 mt-2 mt-md-0">
                    <h2 class="custom-color">Order Summary</h2>
                    <div class="cart-table cart-table--sm pt-3 pt-md-0">
                        <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                            <div class="cart-table-prd-image text-center">
                                Image
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">Name</div>
                                <div class="cart-table-prd-qty">Qty</div>
                                <div class="cart-table-prd-price">Price</div>
                            </div>
                        </div>
                        <div class="cart-table-prd">
                            <div class="cart-table-prd-image">
                                <a href="#" class="prd-img"><img class="lazyload fade-up" src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" alt=""></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <h2 class="cart-table-prd-name"><a href="product.html">Leather Pegged Pants</a></h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="qty qty-changer">
                                        <input type="text" class="qty-input disabled" value="2" data-min="0" data-max="1000">
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    $352.00
                                </div>
                            </div>
                        </div>
                        <div class="cart-table-prd">
                            <div class="cart-table-prd-image">
                                <a href="#" class="prd-img"><img class="lazyload fade-up" src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-16-1.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-16-1.webp" alt=""></a>
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">
                                    <h2 class="cart-table-prd-name"><a href="product.html">Cascade Casual Shirt</a></h2>
                                </div>
                                <div class="cart-table-prd-qty">
                                    <div class="qty qty-changer">
                                        <input type="text" class="qty-input disabled" value="2" data-min="0" data-max="1000">
                                    </div>
                                </div>
                                <div class="cart-table-prd-price-total">
                                    $142.00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <div class="mt-2"></div>
                    <div class="card">
                        <div class="cart-total-sm card-body card-body3">
                            <span>Subtotal</span>
                            <span class="card-total-price mb-0">$ 384.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection