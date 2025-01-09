<a href="{{ route('dashboard.brands.edit', $brand->id) }}"
    class="btn btn-primary btn-sm">{{ __('dashboard.edit') }}</a>

{{-- <a href="{{ route('dashboard.brands.destroy', $brand->id) }}"
    class="delete_confirm btn btn-danger btn-sm" style="display: inline">{{ __('dashboard.delete') }}</a> --}}

<form action="{{ route('dashboard.brands.destroy', $brand->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="button" class="delete_confirm btn btn-danger btn-sm">{{ __('dashboard.delete') }}</button>
</form>
<a href="{{ route('dashboard.brands.status', $brand->id) }}" class="btn btn-warning btn-sm"
    style="display: inline">{{ __('dashboard.status_management') }}</a>
