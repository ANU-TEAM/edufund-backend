@extends('admin.layouts/app')
@section('main-content')


@if($schools->count() > 0)
  <main id="main-container">
    <!-- Page Content -->
    <div class="content content-narrow">
      <div class="row row-deck">
        <div class="col-lg-12">
            <!-- Contextual Table -->
            <div class="block block-mode-loading-oneui">
                <div class="block-header block-header-default">
                <h3 class="block-title">All Schools</h3>
                <div class="block-options">
                    <a href="{{ route('schools.create') }}" class="btn btn-md btn-primary"
                    data-toggle="tooltip" title="New School">
                    <i class="si si-plus"></i>
                    </a>
                </div>
                </div>
                <div class="block-content block-content-full">
                <table class="table table-responsive-sm table-border table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                    <thead class="thead-light">
                    <tr class="text-uppercase">
                        <th class="font-w700" style="width: 50px;">#</th>
                        <th class="font-w700">Abbreviation</th>
                        <th class="font-w700" style="width: 65%;">school Name</th>
                        <th class="text-center font-w700">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($schools as $school)
                        <tr>
                        <th class="text-left" scope="row">
                            {{ $loop->index + 1 }}
                        </th>
                        <td class="font-w600 font-size-sm">{{ $school->abbr }}</td>
                        <td class="font-w400 font-size-sm">{{ $school->name }}</td>
                        <td class="text-center">
                          <form action="{{ route('schools.destroy', ['school' => $school]) }}"
                            method="POST">
                              @csrf
                              @method('DELETE')
                              
                              <div class="btn-group mr-2 mb-2">
                                <a href="{{ route('schools.edit', ['school' => $school]) }}"
                                  data-toggle="tooltip" data-placement="top" title="Edit" 
                                  type="button" class="btn btn-outline-primary">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </a>
                                <button type="submit"
                                  data-toggle="tooltip" data-placement="top" title="Delete" 
                                  type="button" class="btn btn-outline-primary">
                                    <i class="fa fa-fw fa-trash-alt"></i>
                                </button>
                              </div>
                          </form>
                        </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>
            </div>
            <!-- END Contextual Table -->
        </div>
      </div>
    </div>
    <!-- END Page Content -->
  </main>
@else
  <main id="main-container">
    <!-- Page Content -->
    <div class="content content-narrow">
      <!-- Contextual Table -->
      <div class="block">
        <div class="block-content">

          <div class="mt-5 mb-5 text-center">
            <i class="far fa-grin-beam-sweat fa-10x text-info"></i>
            <p class="h2 text-center mt-5">No schools Have Been Created Yet</p>
            <a href="{{ route('schools.create') }}" type="button"
              class="btn btn-info mr-1 mb-3">
              <i class="fa fa-fw fa-plus mr-1"></i> Create schools
            </a>
          </div>

        </div>
      </div>
      <!-- END Contextual Table -->
    </div>
    <!-- END Page Content -->
  </main>
@endif


@endsection