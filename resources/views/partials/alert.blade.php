@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@elseif (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif ($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
