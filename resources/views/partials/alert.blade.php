@if (session('error'))
<div class="alert alert-danger text-capitalize">
    {{ session('error') }}
</div>
@elseif (session('success'))
<div class="alert alert-success text-capitalize">
    {{ session('success') }}
</div>
@elseif ($errors->any())
<ul class="alert alert-danger text-capitalize">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
