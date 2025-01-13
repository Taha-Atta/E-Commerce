<button
class="edit_coupon btn btn-info"
   coupon-id="{{ $coupon->id }}"
coupon-code="{{ $coupon->code }}"
coupon-limit="{{ $coupon->limit }}"
coupon-discount="{{ $coupon->discount_precentage }}"
coupon-start-date="{{ $coupon->start_date }}"
coupon-end-date="{{ $coupon->end_date }}"
coupon-status="{{ $coupon->is_active }}"
>
{{ __('dashboard.edit') }} <i class="la la-edit"></i>
</button>



{{-- <a href="{{ route('dashboard.coupons.destroy', $coupon->id) }}"
    class="delete_confirm btn btn-danger btn-sm" style="display: inline">{{ __('dashboard.delete') }}</a> --}}

{{-- <form  id="delete-coupon" action=""  method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <input type="hidden" coupon_id ={{ $coupon->id }}>
    <button type="button" class="delete_confirm btn btn-danger btn-sm">{{ __('dashboard.delete') }}</button>
</form> --}}

<button type="button" coupon_id ={{ $coupon->id }} id="delete-coupon_ajax" class=" btn btn-danger btn-sm">{{ __('dashboard.delete') }}</button>


<a href="{{ route('dashboard.coupons.status', $coupon->id) }}" class="btn btn-warning btn-sm"
    style="display: inline">{{ __('dashboard.status_management') }}</a>
