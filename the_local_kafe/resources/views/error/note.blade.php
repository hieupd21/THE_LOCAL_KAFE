@if (Session::has('error'))
<p class="alert alert-danger text-center" style="color: red">
    {{Session::get('error')}}
</p>
@endif

@foreach ($errors->all() as $error)
<p class="alert alert-danger text-center" style="color: red">
    {{ $error }}
</p>
@endforeach