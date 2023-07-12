@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    @foreach ($errors->all() as $error)
        <span class="block">{!! $error !!}</span>
    @endforeach
</div>
@endif


@if (session()->has('unverified'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        {{ session('unverified') }} <a href="{{ route('verification.resend') }}">Resend</a>
    </div>
@endif
