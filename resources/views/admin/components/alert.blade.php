
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
 {{ session('success') }}
</div>
                
@endif


@if (session()->has('danger'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
 {{ session('danger') }}
</div>
                
@endif


@if (session()->has('warning'))
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
 {{ session('warning') }}
</div>
                
@endif


@if (session()->has('info'))
<div class="alert alert-info alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
 {{ session('info') }}
</div>
                
@endif

@if (session()->has('primary'))
<div class="alert alert-primary alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
 {{ session('primary') }}
</div>
                
@endif
@if (session()->has('secondary'))
<div class="alert alert-secondary alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
 {{ session('secondary') }}
</div>
                
@endif

