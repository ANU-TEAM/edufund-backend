@extends('admin.layouts/app')
@section('main-content')

<main id="main-container">
  <!-- Page Content -->
  <div class="content content-narrow">
    <!-- Your Block -->
    <div class="block">
      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('admin.users.add') }}" method="POST">
            <div class="block">
              <div class="block-header block-header-default">
                <h3 class="block-title">ADD NEW ADMIN</h3>
                <div class="text-center">
                  <button type="submit" class="btn btn-sm btn-primary">
                    Add Admin
                  </button>
                </div>
                <div class="block-options">
                  <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-secondary"
                    data-toggle="tooltip" title="All Users">
                    <i class="si si-action-undo"></i>
                  </a>
                </div>
              </div>
              <div class="block-content">
                <div class="row justify-content-center py-sm-3 py-md-5">
                  <div class="col-sm-10 col-md-8">
                    @csrf
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" required="required"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} form-control"
                        id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter User Email...">
                      @if($errors->any())
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END Your Block -->
  </div>
  <!-- END Page Content -->
</main>

@endsection