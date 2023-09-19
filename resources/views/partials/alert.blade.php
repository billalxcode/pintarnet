@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@elseif (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif