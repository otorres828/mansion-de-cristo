@if (session('info'))
<div class="alert alert-success alert-dismissible fade show " role="alert">
    <h4><strong>{{session('info')}}</strong></h4>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4><strong>{{session('delete')}}</strong></h4>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif