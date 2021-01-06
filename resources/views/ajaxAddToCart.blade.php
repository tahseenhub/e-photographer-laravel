@if ($message=='error')
    <div class="text-center" id="danger-message" style="background:rgba(207, 0, 15, 1); color:#fff; padding:20px;">
        Already added to cart
    </div>
@elseif($message=='success')
    <div class="text-center" id="success-message" style="background:rgba(0, 153, 51,.7); color:#fff; padding:20px;">
        successfully added to cart
   </div>
@endif

<script>
    $('#cart-number').html('&nbsp; '+{{count($carts)}});
</script>