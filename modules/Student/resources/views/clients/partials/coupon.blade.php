<h4 class="mb-3">Mã giảm giá</h4>
<form action="" class="mb-3 coupon-form {{ !$order->coupon_code ? '' : 'd-none' }}">
    <fieldset>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Nhập mã giảm giá...">
            <button class="btn btn-success">Accept</button>
        </div>
        <span class="text-danger error"></span>
    </fieldset>
</form>

<div class="coupon-usage btn-group mb-3 {{ !$order->coupon_code ? 'd-none' : '' }}">
    <button class="btn btn-sm btn-success coupon-code" type="button">{{ $order->coupon_code }}</button>
    <button class="btn btn-sm btn-danger js-remove-coupon" type="button">&times;</button>
</div>

