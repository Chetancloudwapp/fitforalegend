@extends('front.layout.master')
@section('content')
<style>
	.disabled {
		background: gray !important;
		/* pointer-events: none; */
		text-decoration: none;
		opacity: 0.5;
		cursor: not-allowed;
	}

	[data-slick]:not(.slick-initialized) {
		opacity: 1;
		visibility: visible;
	}
</style>
<div class="page-content">
	<div class="holder breadcrumbs-wrap mt-0">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="category.html">Women</a></li>
				<li><span>Leather Pegged Pants</span></li>
			</ul>
		</div>
	</div>
	<div class="holder">
		<div class="container js-prd-gallery" id="prdGallery">
			<div class="row prd-block prd-block-under prd-block--prv-bottom">
				<div class="col">
					<div class="js-prd-d-holder">
						<div class="prd-block_title-wrap">
							<div class="prd-block_reviews" data-toggle="tooltip" data-placement="top"
								title="Scroll To Reviews"><i class="icon-star-fill fill"></i><i
									class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
									class="icon-star-fill fill"></i><i class="icon-star"></i>
								<span class="reviews-link"><a href="#" class="js-reviews-link"> (17 reviews)</a></span>
							</div>
							<h1 class="prd-block_title">{{$product->name}}</h1>
							{{-- <h1 class="prd-block_title">{{ $get_categories['name']}}</h1> --}}
						</div>
					</div>
				</div>
				{{-- <div class="col-md-auto prd-block-prevnext-wrap">
					<div class="prd-block-prevnext">
						<a href="#"><span class="prd-img"><img class="lazyload fade-up"
									src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
									data-src="images/skins/fashion/products/product-02-1.webp" alt=""><i
									class="icon-arrow-left"></i></span></a>
						<a href="#"><span class="prd-img"><img class="lazyload fade-up"
									src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
									data-src="images/skins/fashion/products/product-01-1.webp" alt=""></span></a>
						<a href="#"><span class="prd-img"><img class="lazyload fade-up"
									src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
									data-src="images/skins/fashion/products/product-15-1.webp" alt=""><i
									class="icon-arrow-right"></i></span></a>
					</div>
				</div> --}}
			</div>
			<div class="print_error_msg"></div>
				<div class="print_success_msg"></div>
			<div class="row prd-block prd-block--prv-bottom">
				<div class="col-md-6 col-lg-6 col-xl-6 aside--sticky js-sticky-collision">
					<div class="aside-content">
						<div class="mb-2 js-prd-m-holder"></div>
						<div class="prd-block_main-image">
							<div class="prd-block_main-image-holder" id="prdMainImage">
								<div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">
									{{-- <div data-value="Beige"><span class="prd-img">
										<img src="{{ $product['featured_image'] != '' ? asset('uploads/products/featuredImages/large/'. $product['featured_image']) : asset('assets/upload/placeholder.png') }}"
										data-src="{{ $product['featured_image'] != '' ? asset('uploads/products/featuredImages/large/'. $product['featured_image']) : asset('assets/upload/placeholder.png') }}" class="lazyload fade-up elzoom"
										alt=""
										data-zoom-image="{{ asset('uploads/products/featuredImages/medium/'. $product['featured_image'])}}" />
										</span>
									</div> --}}
									@foreach($product['images'] as $value)
									<div data-value="Beige"><span class="prd-img"><img
												src="{{ $value['image'] != '' ? asset('uploads/products/galleryImages/large/'. $value['image']) : asset('assets/upload/placeholder.png') }}"
												data-src="{{ $value['image'] != '' ? asset('uploads/products/galleryImages/large/'. $value['image']) : asset('assets/upload/placeholder.png') }}"
												alt="" class="lazyload fade-up elzoom"
												data-zoom-image="{{ asset('uploads/products/galleryImages/large/'. $value['image'])}}"/></span>
									</div>
									@endforeach
								</div>
								<div class="prd-block_label-sale-squared justify-content-center align-items-center">
									@if($product->quantity>0)
									<span class="badge badge-success">In Stock</span>
									@else
									<span>Out of Stock</span>
									@endif
								</div>
							</div>
						</div>
						<div class="product-previews-wrapper">
							<div class="product-previews-carousel js-product-previews-carousel">
								{{-- <a href="#" data-value="Beige">
									<span class="prd-img">
										<img src="{{ $product['featured_image'] != '' ? asset('uploads/products/featuredImages/large/'. $product['featured_image']) : asset('assets/upload/placeholder.png') }}"
											data-src="{{  $product['featured_image'] != '' ? asset('uploads/products/featuredImages/large/'.  $product['featured_image']) : asset('assets/upload/placeholder.png') }}" class="lazyload fade-up elzoom"
											alt="" /></span>
								</a> --}}
								@foreach($product['images'] as $value)
								<a href="#" data-value="Beige">
									<span class="prd-img">
										<img src="{{ $value['image'] != '' ? asset('uploads/products/galleryImages/large/'. $value['image']) : asset('assets/upload/placeholder.png') }}"
											data-src="{{ $value['image'] != '' ? asset('uploads/products/galleryImages/large/'. $value['image']) : asset('assets/upload/placeholder.png') }}"
											class="lazyload fade-up" alt="" /> 
									</span>
								</a>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-xl-6">
					<div class="prd-block_info--style1"
						data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
						<div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
							<div class="prd-block_price prd-block_price--style2">

								<span class="getAttributePrice">
									<div class="prd-block_price--actual">${{ $product->selling_price}}</div>
								</span>
								<div class="prd-block_price-old-wrap">
									<span class="prd-block_price--old">${{ $product->cost_price}}</span>
									<span class="prd-block_price--text">You Save: $131.99 (28%)</span>
								</div>
							</div>
						</div>
						<div class="prd-block_description prd-block_info_item ">
							<h3>Short description</h3>
							<p>{{ $product->short_description}}</p>
							<div class="mt-1"></div>
						</div>
						<div class="order-0 order-md-100">
							<form name="addToCart" id="addToCart" method="post" action="javascript:;">
							{{-- <form method="post" action="{{ route('cart.add')}}"> --}}
								@csrf
								<input type="hidden" name="product_id" value="{{ $product->id }}">
								<div class="prd-block_options">
									<div class="prd-color swatches">
										<div class="option-label">Color:</div>
										{{-- <select name="color" data-type="color" data-product="{{ $product->id }}"
											class="form-control getPrice single-option-selector-modalQuickView"
											id="SingleOptionSelector-0" data-index="option1">
											<?php /* $count = 0 ; */ ?>
											@foreach($arr2 as $row)
											<option value="{{ $row->id}}"
												data-type="{{ $get_var_products[$count]->id }}">{{ $row->name}}</option>
											<?php /* $count++ ; */ ?>
											@endforeach
										</select> --}}

										<ul class="images-list js-size-list">
											<?php $count =0; ?>
											@foreach($arr2 as $row)
											@if($get_var_products[$count]['quantity']>0)
											{{-- {{ dd($get_var_products[$count]['quantity'])}} --}}
											<li>
												<a href="{{ url('product_detail/'.$get_var_products[$count]['id'])}}"
													style="background-color: {{ $row->color_code}}; width:30px; height:15px; display: block" data-value="{{ $row->name}}" data-original-title="{{ $row->name }}" data-toggle="tooltip"
													data-placement="top">
												</a>
											</li>
											@else
											<li>
												{{-- Color is Disabled --}}
												<a href="javascript:void(0)" data-value="{{ $row->name}}" data-original-title="{{ $row->name }}" data-toggle="tooltip"
													data-placement="top" 
													class="disabled" style="background-color: {{ $row->color_code}}; width:30px; height:15px;"><span
														class="image-container image-container--product "></span>
												</a>
											</li>
											@endif
											<?php $count++; ?>
											@endforeach
										</ul>
									</div>
									<div class="prd-size swatches">
										<div class="option-label">Size:</div>
										<select name="size" data-type="size" id="getPrice"
											data-product="{{ $product->id }}"
											class="form-control single-option-selector-modalQuickView getPrice"
											data-index="option2">
											{{-- <option value="">Select size</option> --}}
											<?php $count = 0 ;?>
											@foreach($arr as $row)
											<option value="{{$row->id}}" data-type="{{ $get_var_products[$count]->id }}"
												{{ $row->id == $product->size ? 'selected' : ''}}>{{$row->name}}
											</option>
											<?php $count++ ;?>
											@endforeach
										</select>
										{{-- <ul class="size-list js-size-list" data-select-id="SingleOptionSelector-1">
											@foreach($arr as $row)
											<li class="active">
												<a href="#" data-value="{{ $row->name}}"
													style="background-color:white;"><span class="value">{{
														$row->name}}</span></a>
											</li>
											<div class="size__radio">
												<input type="radio" id="{{ $row->id }}" name="size"
													value="{{ $row->name }}" required>
												<label class="size__radio-label" for="{{ $row->id }}">{{
													$row->name}}</label>
											</div>
											@endforeach
											<li>
												<a href="#" data-value="Medium"><span class="value">Medium</span></a>
											</li>
											<li>
												<a href="#" data-value="Large"><span class="value">Large</span></a>
											</li>
										</ul> --}}
									</div>
								</div>
								<div class="prd-block_actions prd-block_actions--wishlist">
									<div class="prd-block_qty">
										<div class="option-label">Quantity:</div>
										<div class="qty qty-changer">
											<button class="decrease js-qty-button"></button>
											<input type="number" class="qty-input" name="quantity" value="1"
												data-min="1" data-max="1000">
											<button class="increase js-qty-button"></button>
										</div>
									</div>
								</div>
								<div class="prd-block_actions prd-block_actions--wishlist">
									<div class="btn-wrap">
										{{-- <button
											class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart"
											type="submit">Add to cart</button> --}}
										{{-- <a href="javascript:void(0)"
											class="btn btn--add-to-cart btn--sm js-trigger-addtocart js-prd-addtocart">
											<span>Add to cart</span>
										</a> --}}
										<?php
											$showCart = App\Models\Cart::where(['product_id' => $product['id'], 'user_id' => Auth::id()])->first();
										?>
										@if($showCart)
											<a href="{{ route('view_cart')}}">
												<button type="button" class="btn btn--add-to-cart js-trigger js-prd" data-src="cart.html">Go to cart</button>
											</a>
										@else
										{{-- <span class="cartdata">	<a href="{{ route('view_cart')}}">
											<button class="btn btn--add-to-cart js-trigger js-prd" data-src="cart.html">Go to cart</button>
										</a></span> --}}
										<span class="datacart">
											<a href="{{ route('login')}}">
												<button type="submit" class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart" data-src="cart.html">Add to cart</button>
											</a></span>
										@endif
										{{-- <a href="{{ route('login')}}">
											<button type="submit" class="btn btn--add-to-cart js-trigger-addtocart js-prd-addtocart" data-src="cart.html">Add to cart</button>
										</a> --}}
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="holder mt-3 mt-md-5">
		<div class="container">
			<ul class="nav nav-tabs product-tab">
				<li class="nav-item"><a href="#Tab1" class="nav-link" data-toggle="tab">Description
						<span class="toggle-arrow"><span></span><span></span></span>
					</a>
				</li>
				<li class="nav-item"><a href="#Tab2" class="nav-link" data-toggle="tab">Sizing Guide
						<span class="toggle-arrow"><span></span><span></span></span>
					</a>
				</li>
				<li class="nav-item"><a href="#Tab5" class="nav-link" data-toggle="tab">Reviews
						<span class="toggle-arrow"><span></span><span></span></span>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade" id="Tab1">
					{{-- <h4 class="mb-15">Give you a complete account of the system</h4> --}}
					<div class="row">
						<div class="col-md-18">
							<p>{{ $product->description}}</p>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="Tab2">
					<h3>Single Size Conversion</h3>
					<table class="table table-striped">
						<tr>
							<th scope="row">US Sizes</th>
							<td>6</td>
							<td>6,5</td>
							<td>7</td>
							<td>7,5</td>
							<td>8</td>
							<td>8,5</td>
							<td>9</td>
							<td>9,5</td>
							<td>10</td>
							<td>10,5</td>
						</tr>
						<tr>
							<th scope="row">Euro Sizes</th>
							<td>39</td>
							<td>39</td>
							<td>40</td>
							<td>40-41</td>
							<td>41</td>
							<td>41-42</td>
							<td>42</td>
							<td>42-43</td>
							<td>43</td>
							<td>43-44</td>
						</tr>
						<tr>
							<th scope="row">UK Sizes</th>
							<td>5,5</td>
							<td>6</td>
							<td>6,5</td>
							<td>7</td>
							<td>7,5</td>
							<td>8</td>
							<td>8,5</td>
							<td>9</td>
							<td>9,5</td>
							<td>10</td>
						</tr>
						<tr>
							<th scope="row">Inches</th>
							<td>9.25&quot;</td>
							<td>9.5&quot;</td>
							<td>9.625&quot;</td>
							<td>9.75&quot;</td>
							<td>9.9375&quot;</td>
							<td>10.125&quot;</td>
							<td>10.25&quot;</td>
							<td>10.5&quot;</td>
							<td>10.625&quot;</td>
							<td>10.75&quot;</td>
						</tr>
						<tr>
							<th scope="row">CM</th>
							<td>23,5</td>
							<td>24,1</td>
							<td>24,4</td>
							<td>24,8</td>
							<td>25,4</td>
							<td>25,7</td>
							<td>26</td>
							<td>26,7</td>
							<td>27</td>
							<td>27,3</td>
						</tr>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="Tab5">
					<div id="productReviews">
						<div class="row align-items-center">
							<div class="col">
								<h2>CUSTOMER REVIEWS</h2>
							</div>
							<div class="col-18 col-md-auto mb-3 mb-md-0"><a href="#" class="review-write-link"><i
										class="icon-pencil"></i>Write review</a></div>
						</div>
						<div id="productReviewsBottom">
							<div class="review-item">
								<div class="review-item_rating">
									<i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
										class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
										class="icon-star-fill fill"></i>
								</div>
								<div class="review-item_top row align-items-center">
									<div class="col">
										<h5 class="review-item_author">Jaden Ngo on May 25, 2018</h5>
									</div>
									<div class="col-auto"><a href="#" class="review-item_report">Report as
											Inappropriate</a></div>
								</div>
								<div class="review-item_content">
									<h4>Good ball and company</h4>
									<p>I recently bought this ball and this is the first ball that I actually buy based
										on quality and material, I always been playing my friend ball and one of them
										recommended me this, read some review online and decided to buy it, the ball
										feel sticky at first but quality is nice and the hand wrote letter was awesome
										because it shows how much season creator actually care about their customers.
									</p>
								</div>
							</div>
							<div class="review-item">
								<div class="review-item_rating">
									<i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
										class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
										class="icon-star-fill fill"></i>
								</div>
								<div class="review-item_top row align-items-center">
									<div class="col">
										<h5 class="review-item_author">Jaden Ngo on May 25, 2018</h5>
									</div>
									<div class="col-auto"><a href="#" class="review-item_report">Report as
											Inappropriate</a></div>
								</div>
								<div class="review-item_content">
									<h4>Good ball and company</h4>
									<p>I recently bought this ball and this is the first ball that I actually buy based
										on quality and material, I always been playing my friend ball and one of them
										recommended me this, read some review online and decided to buy it, the ball
										feel sticky at first but quality is nice and the hand wrote letter was awesome
										because it shows how much season creator actually care about their customers.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="holder">
		<div class="container">
			<div class="title-wrap text-center">
				<h2 class="h1-style">You may also like</h2>
				<div class="carousel-arrows carousel-arrows--center"></div>
			</div>
			<div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
				data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
				@foreach($relatedProducts as $product)
				<div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
					<div class="prd-inside">
						<div class="prd-img-area">
							<a href="{{ url('product_detail/'.$product['id'])}}"
								class="prd-img image-hover-scale image-container">
								<img src="{{ asset('uploads/products/featuredImages/medium/'. $product['featured_image'])}}"
									alt="{{ asset('assets/upload/placeholder.png') }}" class="js-prd-img lazyload fade-up">
								<div class="foxic-loader"></div>
								<div class="prd-big-squared-labels">
								</div>
							</a>
							<div class="prd-circle-labels">
								<a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
									title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
									class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
									title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
								<a href="#" class="circle-label-qview js-prd-quickview prd-hide-mobile"
									data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK
										VIEW</span></a>
								<div class="colorswatch-label colorswatch-label--variants js-prd-colorswatch">
									<i class="icon-palette"><span class="path1"></span><span class="path2"></span><span
											class="path3"></span><span class="path4"></span><span
											class="path5"></span><span class="path6"></span><span
											class="path7"></span><span class="path8"></span><span
											class="path9"></span><span class="path10"></span></i>
									<ul>
										<li
											data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-1.webp">
											<a class="js-color-toggle" data-toggle="tooltip" data-placement="left"
												title="Color Name"><img src="images/colorswatch/color-grey.html"
													alt=""></a>
										</li>
										<li
											data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-2.webp">
											<a class="js-color-toggle" data-toggle="tooltip" data-placement="left"
												title="Color Name"><img src="images/colorswatch/color-green.html"
													alt=""></a>
										</li>
										<li
											data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-3.webp">
											<a class="js-color-toggle" data-toggle="tooltip" data-placement="left"
												title="Color Name"><img src="images/colorswatch/color-black.html"
													alt=""></a>
										</li>
									</ul>
								</div>
							</div>
							{{-- <ul class="list-options color-swatch">
								<li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-1.webp"
									class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip"
										data-placement="right" title="Color Name"><img
											src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-1.webp"
											class="lazyload fade-up" alt="Color Name"></a>
								</li>
								<li
									data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-2.webp">
									<a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right"
										title="Color Name">
										<img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-2.webp"
											data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-2.webp"
											class="lazyload fade-up" alt="Color Name"></a>
								</li>
								<li
									data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-3.webp">
									<a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right"
										title="Color Name"><img
											src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-3.webp"
											data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-06-3.webp"
											class="lazyload fade-up" alt="Color Name"></a>
								</li>
							</ul> --}}
						</div>
						<div class="prd-info">
							<div class="prd-info-wrap">
								<div class="prd-info-top">
									<div class="prd-rating"><i class="icon-star-fill fill"></i><i
											class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
											class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
								</div>
								<div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i
										class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i
										class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
								<div class="prd-tag"><a href="#">{{ $product->brands->name}}</a></div>
								<h2 class="prd-title"><a href="{{ url('product_detail/'.$product['id'])}}">{{
										$product->name }}</a></h2>
								<div class="prd-description">
									Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent
									per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia.
								</div>
								<div class="prd-action">
									<form action="#">
										<button class="btn js-prd-addtocart"
											data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add
											To Cart</button>
									</form>
								</div>
							</div>
							<div class="prd-hovers">
								<div class="prd-circle-labels">
									<div><a href="#"
											class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
											title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
											class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
											title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
									<div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview"
											data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK
												VIEW</span></a></div>
								</div>
								<div class="prd-price">
									<div class="price-old">$ {{ $product->cost_price }}</div>
									<div class="price-new">$ {{ $product->selling_price }}</div>
								</div>
								<div class="prd-action">
									<div class="prd-action-left">
										<form action="#">
											<button class="btn js-prd-addtocart"
												data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add
												To Cart</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- <script>
	$('.disabled-link').addClass('disabled-link');
// Enable the link
$('.disabled-link').removeClass('disabled-link');

$(document).ready(function(){
	$(".getPrice").on('change' ,function(){
		var color_size = $(this).val();
		var type = $(this).attr('data-type');
		var product_id = $(this).find('option:selected').attr("data-type");
		alert(color_size);
		alert(type);
		alert(product_id);

		var color = $(this).val();
		var  = $(this).val();
		var product_id = $(this).attr("data-product")
		var color_product_id = $(this).find('option:selected').attr("color-var-id");
		alert(color_product_id);
		$.ajax({
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			type:'post',
            url:"{{ route('get_product_price')}}",
            data:{size:size, product_id:product_id, color:color, color_product_id:color_product_id},
			success:function(resp){
                alert(resp['color']);
				
                 $(".getAttributePrice").html("<div class='prd-block_price--actual'>$."+resp.selling_price+"</div>")
               
			},error:function(){
				alert("Error")
			}
		})
	});
});

$(document).querySelectorAll(".getPrice").forEach(element => {
	var color_size = $(this).val();
		var type = $(this).attr('data-type');
		var product_id = $(this).find('option:selected').attr("data-type");
		alert(color_size);
		alert(type);
		alert(product_id);
});
</script> --}}
 
{{-- Add to Cart Via Ajax --}}
<script>
	$(document).ready(function(){
		$("#addToCart").submit(function(){
			var formData = $(this).serialize();
			// alert(formData);
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url : "{{ route('addToCart')}}",
				type : 'post',
				data : formData,
				success:function(resp){
					if(resp['status'] == true){
						$('.print_success_msg').show();
                       $('.print_success_msg').delay(4000).fadeOut('slow');
                       $('.print_success_msg').html("<div class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success: </strong> "+resp['message']+"</div>");


					}else{
						// if(resp.redirect == 'login'){
						// 	root = "{{ config('app.url')}}"
						// 	window.location.href = root + "user_login"
						// }
                       $('.print_error_msg').show();
                       $('.print_error_msg').delay(4000).fadeOut('slow');
                       $('.print_error_msg').html("<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error: </strong> "+resp['message']+"</div>");
					}
				},error:function(){
					alert('Error')
				}
			});
		});
	});
</script>
{{-- <script>
	$(document).ready(function(){
		$("#addToCart").submit(function(){
			var formData = $(this).serialize();
			// alert(formData);
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url : "{{ route('addToCart')}}",
				type : 'post',
				data : formData,
				success:function(resp){
					if(resp['status'] == true){
						$('.print_success_msg').show();
                       $('.print_success_msg').delay(3000).fadeOut('slow');
                       $('.print_success_msg').html("<div class='alert alert-success alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success: </strong> "+resp['message']+"</div>");

					}else{
						if(resp.redirect == 'login'){
							root = "{{ config('app.url')}}"
							window.location.href = root + "user_login"
						}
                       $('.print_error_msg').show();
                       $('.print_error_msg').delay(3000).fadeOut('slow');
                       $('.print_error_msg').html("<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error: </strong> "+resp['message']+"</div>");
					}
				},error:function(){
					alert('Error')
				}
			});
		});
	});
</script> --}}
@endsection

{{-- // $(".getAttributePrice").html("(<div class='prd-block_price--actual'>$."+resp.selling_price+"</div>"
<div class='prd-block_price-old-wrap'> <span class='prd-block_price--old+$resp.cost_price+"</span>
   <span class=' prd-block_price--text'>You Save: $131.99 (28%)</span>
</div>")") --}}

{{-- three conditions remember
1). product size is not out of stock (ie stock > 0)
2). Product is not unavailable i.e status is not zero
3). Product size not already exists in shopping cart --}}