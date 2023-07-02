@if (session('message'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{session('message')}}</strong>
</div>
@endif