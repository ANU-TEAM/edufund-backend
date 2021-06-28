@extends('admin.layouts/app')

@section('main-content')

  <main id="main-container">

    <!-- Page Content -->
    <div class="content content-narrow">

      <!-- List of Applicants -->
      <div class="row row-deck">

        <div class="col-lg-12">
          <div class="block block-mode-loading-oneui">
            <div class="block-header block-header-default">
              <h3 class="block-title">Unresolved Issues</h3>
              <div class="block-options">
                <span class="badge btn-secondary">
                  {{ $feedbacks->count() }}
                </span>
              </div>
            </div>
            <div class="block-content block-content-full">
              <table class="table table-responsive-sm table-border table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                <thead class="thead-light">
                  <tr class="text-uppercase">
                    <th style="width: 50px;">#</th>
                    <th class="font-w700" style="width: 40%;">Issue</th>
                    <th>Rating</th>
                    <th>Date</th>
                    <th class="text-center font-w700">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                        <tr>
                            <td>
                                <span class="font-w600">{{ $loop->index + 1}}</span>
                            </td>
                            <td>
                                <span class="font-w400 font-size-sm">
                                     {{ $feedback->comment }}
                                </span>
                            </td>
                            <td>
                                <span class="font-w600">
                                     {{ $feedback->rating }}
                                </span>
                            </td>
                            <td>
                                {{ date('d-m-Y h:m A', strtotime($feedback->created_at)) }}
                            </td>
                            <td class="text-center">
                              <div class="btn-group mr-2 mb-2">
                                  
                                  @if ($feedback->resolved == 0)
                                    <a href="{{ route('resolve', ['id' => $feedback->id]) }}" data-toggle="tooltip" data-placement="top" title="Resolve" 
                                      type="button" class="btn btn-outline-primary">
                                        <i class="fa fa-fw fa-check"></i>
                                    </a>
                                  @endif

                                  @if ($feedback->resolved == 1)
                                  <a href="{{ route('unresolve', ['id' => $feedback->id]) }}" data-toggle="tooltip" data-placement="top" title="Unresolve" 
                                    type="button" class="btn btn-outline-primary">
                                      <i class="fa fa-fw fa-times"></i>
                                  </a>
                                  @endif
                              </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- END List of Applicants -->
    </div>
    <!-- END Page Content -->
  </main>

@endsection
