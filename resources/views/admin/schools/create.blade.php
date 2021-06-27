@extends('admin.layouts/app')
@section('main-content')

<main id="main-container">
  <!-- Page Content -->
  <div class="content content-narrow">
    <!-- Your Block -->
    <div class="block">
      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('schools.store') }}" method="POST">
            <div class="block">
              <div class="block-header block-header-default">
                <h3 class="block-title">ADD A SCHOOL</h3>
                <div class="text-center">
                  <button type="submit" class="btn btn-sm btn-primary">
                    Save School
                  </button>
                </div>
                <div class="block-options">
                  <a href="{{ route('schools.index') }}" class="btn btn-sm btn-secondary"
                    data-toggle="tooltip" title="All Schools">
                    <i class="si si-action-undo"></i>
                  </a>
                </div>
              </div>
              <div class="block-content">
                <div class="row justify-content-center py-sm-3 py-md-5">
                  <div class="col-sm-10 col-md-8">
                    @csrf
                    <div class="form-group">
                      <label for="abbr">Abbreviation</label>
                      <input type="text"
                        class="form-control {{ $errors->has('abbr') ? 'is-invalid' : '' }} form-control"
                        id="abbr" name="abbr" value="{{ old('abbr') }}"
                        placeholder="Enter School Abbreviation...">
                      @if($errors->any())
                        <div class="invalid-feedback">{{ $errors->first('abbr') }}</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} form-control"
                        id="name" name="name" value="{{ old('name') }}"
                        placeholder="Enter School Name...">
                      @if($errors->any())
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
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