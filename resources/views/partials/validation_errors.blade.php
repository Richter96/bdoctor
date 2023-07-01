@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Validation errors</strong>
        <ul class="my-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{-- /.alert - if error in the form --}}
