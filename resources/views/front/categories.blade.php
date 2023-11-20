@extends('front.layout.master')
@section('content')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="home.html">Home</a></li>
                <li><span>Category</span></li>
                <!--<li class="d-block mt-2 page-title2">Men's Jeckets<span> - 125 items</span></li>-->
            </ul>
            <!-- <div class="page-title text-center">
                <h1>WOMEN’S</h1>
                </div> -->
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-md-10 p-1">
                        <li class="d-block mt-2 page-title2">Men's Jeckets<span> - 125 items</span></li>
                    </div>
                    <div class="col-md-8 p-1 d-flex justify-content-end">
                        <div class="select-wrap d-none d-md-flex">
                            <div class="select-label">SORT:</div>
                            <div class="select-wrapper select-wrapper-xxs">
                                <select class="form-control input-sm">
                                    <option value="featured">Featured</option>
                                    <option value="rating">Rating</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="select-wrap d-none d-md-flex">
                            <div class="select-label">VIEW:</div>
                            <div class="select-wrapper select-wrapper-xxs">
                                <select class="form-control input-sm">
                                    <option value="featured">12</option>
                                    <option value="rating">36</option>
                                    <option value="price">100</option>
                                </select>
                            </div>
                        </div>
                        <div class="viewmode-wrap d-flex align-items-center">
                            <div class="view-mode">
                                <span class="js-horview d-none d-lg-inline-flex"><i class="icon-grid"></i></span>
                                <span class="js-gridview"><i class="icon-grid"></i></span>
                                <span class="js-listview"><i class="icon-list"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop" data-grid-tab-content>
                    <div class="filter-col-content filter-mobile-content">
                        <div class="sidebar-block">
                            <div class="sidebar-block_title">
                                <span>Current selection</span>
                            </div>
                            <div class="sidebar-block_content pb-0">
                                <div class="selected-filters-wrap">
                                    <ul class="selected-filters">
                                        <li><a href="javascript:;">Grey</a></li>
                                        <li><a href="javascript:;">Men</a></li>
                                        <li><a href="javascript:;">Above $200</a></li>
                                    </ul>
                                    <div class="d-flex flex-wrap align-items-center pb-0 mb-0" >
                                        <!-- <a href="#" class="clear-filters"><span>Clear All</span></a> -->
                                        <span class="font-bold">FILTERS</span>
                                        <a href="#" class="clear-filters ml-auto"><span>Clear All</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-block d-filter-mobile">
                            <h3 class="mb-1">SORT BY</h3>
                            <div class="select-wrapper select-wrapper-xs">
                                <select class="form-control">
                                    <option value="featured">Featured</option>
                                    <option value="rating">Rating</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="sidebar-block filter-group-block open">
                            <div class="sidebar-block_title">
                                <span>Categories</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list">
                                    <li>
                                        <p  title="Casual" class="open cat-heading">Jeckets</span></p>
                                        <div class="toggle-category js-toggle-category"><span><i class="icon-angle-down"></i></span></div>
                                        <ul class="category-list category-list cat-list" >
                                            <li><a href="javascript:;" title="Men" class="open">Men's jeckets</a></li>
                                            <li><a href="javascript:;" title="Women" class="open">Women's jeckets</a></li>
                                            <li><a href="javascript:;" title="Accessories" class="open">Kids's jeckets</a></li>
                                        </ul>
                                    </li>
                                    <!-- <li><a href="javascript:;" title="T-Shirts" class="open">T-Shirts</a></li> -->
                                    <!-- 
                                        <li><a href="javascript:;" title="T-Shirts" class="open">T-Shirts</a></li>
                                        <li><a href="javascript:;" title="Medical" class="open">Medical</a></li>
                                        <li><a href="javascript:;" title="FoodMarket" class="open">FoodMarket</a></li>
                                        <li><a href="javascript:;" title="Bikes" class="open">Bikes&nbsp;<span>(12)</span></a></li>
                                        <li><a href="javascript:;" title="Cosmetics" class="open">Cosmetics&nbsp;<span>(16)</span></a></li>
                                        <li><a href="javascript:;" title="Fishing" class="open">Fishing&nbsp;<span>(20)</span></a></li>
                                        <li><a href="javascript:;" title="Electronics" class="open">Electronics&nbsp;<span>(15)</span></a></li>
                                        <li><a href="javascript:;" title="Games" class="open">Games&nbsp;<span>(14)</span></a></li> -->
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-block filter-group-block collapsed">
                            <div class="sidebar-block_title">
                                <span>Colors</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="color-list two-column">
                                    <li class="active"><a href="#" data-tooltip="Dark Red" title="Dark Red"><span class="value"><img
                                        src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-red.webp" alt=""></span><span
                                        class="colorname">Red (87)</span></a></li>
                                    <li><a href="javascript:;" data-tooltip="Pink" title="Pink"><span class="value"><img
                                        src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-pink.webp" alt=""></span><span
                                        class="colorname">Pink (95)</span></a></li>
                                    <li><a href="javascript:;" data-tooltip="Violet" title="Violet"><span class="value"><img
                                        src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-violet.webp" alt=""></span><span
                                        class="colorname">Violet (18)</span></a></li>
                                    <li><a href="javascript:;" data-tooltip="Blue" title="Blue"><span class="value"><img
                                        src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-blue.webp" alt=""></span><span
                                        class="colorname">Blue (78)</span></a></li>
                                    <li><a href="javascript:;" data-tooltip="Marine" title="Marine"><span class="value"><img
                                        src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-marine.webp" alt=""></span><span
                                        class="colorname">Marine (45)</span></a></li>
                                    <li><a href="javascript:;" data-tooltip="Orange" title="Orange"><span class="value"><img
                                        src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-orange.webp" alt=""></span><span
                                        class="colorname">Orange (96)</span></a></li>
                                    <li><a href="javascript:;" data-tooltip="Yellow" title="Yellow"><span class="value"><img
                                        src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-yellow.webp" alt=""></span><span
                                        class="colorname">Yellow (55)</span></a></li>
                                    <li><a href="javascript:;" data-tooltip="Dark Yellow" title="Dark Yellow"><span
                                        class="value"><img src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-darkyellow.webp" alt=""></span><span
                                        class="colorname">Dark Yellow (2)</span></a></li>
                                    <li><a href="javascript:;" data-tooltip="Black"
                                        title="Black"><span class="value"><img
                                        src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-black.webp" alt=""></span><span
                                        class="colorname">Black (15)</span></a>
                                    </li>
                                    <li><a href="javascript:;" data-tooltip="White" title="White">
                                        <span class="value"><img
                                            src="https://big-skins.com/frontend/foxic-html-demo/images/colorswatch/color-white.webp" alt=""></span><span
                                            class="colorname">White (58)</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-block filter-group-block collapsed">
                            <div class="sidebar-block_title">
                                <span>Size</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list two-column size-list" data-sort='["XXS","XS","S","M","L","XL","XXL","XXXL"]'>
                                    <li data-value="L" class="active"><a href="#">L</a></li>
                                    <li data-value="XL"><a href="javascript:;">XL</a></li>
                                    <li data-value="XXS"><a href="javascript:;">XXS</a></li>
                                    <li data-value="XS"><a href="javascript:;">XS</a></li>
                                    <li data-value="S"><a href="javascript:;">S</a></li>
                                    <li data-value="XXL"><a href="javascript:;">XXL</a></li>
                                    <li data-value="XXXL"><a href="javascript:;">XXXL</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-block filter-group-block collapsed">
                            <div class="sidebar-block_title">
                                <span>Brands</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list">
                                    <li><a href="#">Adidas</a></li>
                                    <li><a href="#">Nike</a></li>
                                    <li class="active"><a href="#">Reebok</a></li>
                                    <li><a href="#">Ralph Lauren</a></li>
                                    <li><a href="#">Delpozo</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-block filter-group-block collapsed">
                            <div class="sidebar-block_title">
                                <span>Price</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list">
                                    <li><a href="javascript:;">$100-$200</a></li>
                                    <li class="active"><a href="javascript:;">Above $200</a></li>
                                    <li><a href="javascript:;">Under $100</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-block filter-group-block collapsed">
                            <div class="sidebar-block_title">
                                <span>Popular tags</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="tags-list">
                                    <li class="active"><a href="#">Jeans</a></li>
                                    <li><a href="javascript:;">St.Valentine’s gift</a></li>
                                    <li><a href="javascript:;">Sunglasses</a></li>
                                    <li><a href="javascript:;">Discount</a></li>
                                    <li><a href="javascript:;">Maxi dress</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-toggle js-filter-toggle">
                    <div class="loader-horizontal js-loader-horizontal">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                        </div>
                    </div>
                    <span class="filter-toggle-icons js-filter-btn"><i class="icon-filter"></i><i class="icon-filter-close"></i></span>
                    <span class="filter-toggle-text"><a href="#" class="filter-btn-open js-filter-btn">REFINE & SORT</a><a href="#" class="filter-btn-close js-filter-btn">RESET</a><a href="#" class="filter-btn-apply js-filter-btn">APPLY & CLOSE</a></span>
                </div>
                <div class="col-lg aside">
                    <div class="prd-grid-wrap">
                        <div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content>
                            @foreach($get_categories as $categories)
                                @foreach($categories['products']  as $product)
                                    <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                        <div class="prd-inside">
                                            <div class="prd-img-area">
                                                <a href="{{ url('product_detail/'.$product['id'])}}" class="prd-img image-hover-scale image-container">
                                                    {{-- <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up"> --}}
                                                    <img src = "{{ url('uploads/products', $product['featured_image'])}}">
                                                    <div class="foxic-loader"></div>
                                                    <div class="prd-big-squared-labels">
                                                        <div class="label-new"><span>New</span></div>
                                                        <div class="label-sale">
                                                            <span>-10% <span class="sale-text">Sale</span></span>
                                                            <div class="countdown-circle">
                                                                <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">
                                                    <i class="icon-heart-stroke"></i>
                                                    </a>
                                                    <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>
                                                    </a> 
                                                </div>
                                                <ul class="list-options color-swatch">
                                                    <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                        <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                        <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                    <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                        <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="lazyload fade-up" alt="Color Name"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="prd-info">
                                                <div class="prd-info-wrap">
                                                    <div class="prd-info-top">
                                                        <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    </div>
                                                    <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                                    <div class="prd-tag"><a href="#">{{ $product['brands']['name'] }}</a></div>
                                                    <h2 class="prd-title"><a href="{{ url('product_detail/'.$product['id'])}}">{{ $product['name']}}</a></h2>
                                                    <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                                    <div class="prd-action">
                                                        <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                    </div>
                                                </div>
                                                <div class="prd-hovers">
                                                    <div class="prd-circle-labels">
                                                        <div>
                                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                        </div>
                                                        <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                                    </div>
                                                    <div class="prd-price">
                                                        <div class="price-old">$ {{ $product['cost_price']}}</div>
                                                        <div class="price-new">$ {{ $product['selling_price']}}</div>
                                                    </div>
                                                    <div class="prd-action">
                                                        <div class="prd-action-left">
                                                            <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                            {{-- <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-squared-labels"> </div>
                                        </a>
                                        <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> 
                                        </div>
                                        <ul class="list-options color-swatch">
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            <div class="prd-tag"><a href="#">Seiko</a></div>
                                            <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>
                                            <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                            <div class="prd-action">
                                                <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-squared-labels">
                                                <div class="label-new"><span>New</span></div>
                                                <div class="label-sale">
                                                    <span>-10% <span class="sale-text">Sale</span></span>
                                                    <div class="countdown-circle">
                                                        <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">
                                            <i class="icon-heart-stroke"></i>
                                            </a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>
                                            </a> 
                                        </div>
                                        <ul class="list-options color-swatch">
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            <div class="prd-tag"><a href="#">Banita</a></div>
                                            <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>
                                            <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                            <div class="prd-action">
                                                <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div>
                                                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                </div>
                                                <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-old">$ 200</div>
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-squared-labels"> </div>
                                        </a>
                                        <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> 
                                        </div>
                                        <ul class="list-options color-swatch">
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            <div class="prd-tag"><a href="#">Seiko</a></div>
                                            <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>
                                            <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                            <div class="prd-action">
                                                <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-squared-labels">
                                                <div class="label-new"><span>New</span></div>
                                                <div class="label-sale">
                                                    <span>-10% <span class="sale-text">Sale</span></span>
                                                    <div class="countdown-circle">
                                                        <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">
                                            <i class="icon-heart-stroke"></i>
                                            </a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>
                                            </a> 
                                        </div>
                                        <ul class="list-options color-swatch">
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            <div class="prd-tag"><a href="#">Banita</a></div>
                                            <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>
                                            <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                            <div class="prd-action">
                                                <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div>
                                                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                </div>
                                                <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-old">$ 200</div>
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-squared-labels"> </div>
                                        </a>
                                        <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> 
                                        </div>
                                        <ul class="list-options color-swatch">
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            <div class="prd-tag"><a href="#">Seiko</a></div>
                                            <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>
                                            <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                            <div class="prd-action">
                                                <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-squared-labels">
                                                <div class="label-new"><span>New</span></div>
                                                <div class="label-sale">
                                                    <span>-10% <span class="sale-text">Sale</span></span>
                                                    <div class="countdown-circle">
                                                        <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">
                                            <i class="icon-heart-stroke"></i>
                                            </a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>
                                            </a> 
                                        </div>
                                        <ul class="list-options color-swatch">
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            <div class="prd-tag"><a href="#">Banita</a></div>
                                            <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>
                                            <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                            <div class="prd-action">
                                                <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div>
                                                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                </div>
                                                <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-old">$ 200</div>
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" alt="Midi Dress with Belt" class="js-prd-img lazyload fade-up">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-squared-labels"> </div>
                                        </a>
                                        <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a> 
                                        </div>
                                        <ul class="list-options color-swatch">
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-2.webp"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-02-3.webp"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            <div class="prd-tag"><a href="#">Seiko</a></div>
                                            <h2 class="prd-title"><a href="product.html">Midi Dress with Belt</a></h2>
                                            <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                            <div class="prd-action">
                                                <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div><a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a></div>
                                                <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Midi Dress with Belt", "path":"images/skins/fashion/products/product-06-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="product.html" class="prd-img image-hover-scale image-container">
                                            <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
                                            <div class="foxic-loader"></div>
                                            <div class="prd-big-squared-labels">
                                                <div class="label-new"><span>New</span></div>
                                                <div class="label-sale">
                                                    <span>-10% <span class="sale-text">Sale</span></span>
                                                    <div class="countdown-circle">
                                                        <div class="countdown js-countdown" data-countdown="2021/07/01"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="prd-circle-labels"> <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist">
                                            <i class="icon-heart-stroke"></i>
                                            </a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i>
                                            </a> 
                                        </div>
                                        <ul class="list-options color-swatch">
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="active"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-3.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" data-src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-2.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                            <li data-image="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp"><a href="#" class="js-color-toggle" data-toggle="tooltip" data-placement="right" title="Color Name">
                                                <img src="https://big-skins.com/frontend/foxic-html-demo/images/skins/fashion/products/product-01-1.webp" class="lazyload fade-up" alt="Color Name"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-info-top">
                                                <div class="prd-rating"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            </div>
                                            <div class="prd-rating justify-content-center"><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i><i class="icon-star-fill fill"></i></div>
                                            <div class="prd-tag"><a href="#">Banita</a></div>
                                            <h2 class="prd-title"><a href="product.html">Oversized Cotton Blouse</a></h2>
                                            <div class="prd-description"> Quisque volutpat condimentum velit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam nec ante sed lacinia. </div>
                                            <div class="prd-action">
                                                <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                            </div>
                                        </div>
                                        <div class="prd-hovers">
                                            <div class="prd-circle-labels">
                                                <div>
                                                    <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                                </div>
                                                <div class="prd-hide-mobile"><a href="#" class="circle-label-qview js-prd-quickview" data-src="ajax/ajax-quickview.html"><i class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-old">$ 200</div>
                                                <div class="price-new">$ 180</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="#"> <button class="btn js-prd-addtocart" data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.webp", "url":"product.html", "aspect_ratio":0.778}'>Add To Cart</button> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection