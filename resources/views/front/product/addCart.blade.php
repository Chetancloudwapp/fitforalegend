@extends('front.layout.master')
@section('content')
<div class="page-content" id="appendCartItems">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span>Cart</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        @include('front.product.cart_items');
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    /*-- Update Cart items quantity --*/
    $(document).on('click', '.updateCartItem', function(){
        if($(this).hasClass('qtyPlus')){
            // get quantity
            var quantity = $(this).data('qty');
            // increase the quantity by one
            new_qty = parseInt(quantity) + 1;
        }
        if($(this).hasClass('qtyMinus')){
            // get quantity
            var quantity = $(this).data('qty');
            // Check product quantity is atleast one 
            if(quantity<=1){
                alert("Item quantity must be 1 or greater!");
                return false;
            }
            // Decrease the quantity by one
            new_qty = parseInt(quantity) - 1;
        }
        var cartid = $(this).data('cartid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data : {cartid:cartid, qty:new_qty},
            url :"{{ route('updateCart')}}",
            type : 'post',
            success:function(resp){
                if(resp.status == false){
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);
            },error:function(resp){
                alert('Error')
            }
        });
    });

    // Delete Cart items 
    $(document).on('click', '.deleteCartitem', function(){
        var cartid = $(this).data('cartid');
        var result = confirm("Are you sure you want to delete this cart item?");
        if(result){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data : {cartid:cartid},
                url : "{{ route('deleteCart')}}",
                type : 'post',
                success:function(resp){
                    // alert(resp);
                    $("#appendCartItems").html(resp.view);
                },error:function(resp){
                    alert('Error');
                }
            });
        }
    });
});
</script>
@endsection