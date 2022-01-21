@if ($errors->any())
    <div {{ $attributes }}>
        <div class="alert alert-danger">{{ __('Email atau Password Anda salah') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
           
        </ul>
    </div>
@endif
