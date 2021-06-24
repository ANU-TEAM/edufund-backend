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
              <h3 class="block-title">All Applications</h3>
              <div class="block-options">
                <span class="badge btn-secondary">
                  {{ $all_applications->count() }}
                </span>
              </div>
            </div>
            <div class="block-content block-content-full">
              <table class="table table-responsive-sm table-border table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                <thead class="thead-light">
                  <tr class="text-uppercase">
                    <th style="width: 50px;">#</th>
                    <th class="font-w700" style="width: 40%;">Application</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th class="text-center font-w700">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($all_applications as $application)
                    <tr>
                      <td>
                        <span class="font-w600">{{ $loop->index + 1}}</span>
                      </td>
                      <td>
                        <a href="{{ route('detail', ['id' => $application->id]) }}" 
                          class="font-w600 font-size-sm">
                           {{ Str::limit($application->title, 35) }}
                        </a>
                      </td>
                      <td>
                        &#x20B5; {{ $application->target_amount }}
                      </td>
                      <td>
                        @if ($application->approved === 0)
                            <span class="font-w600 text-info">Pending</span>
                        @elseif ($application->approved === 1)
                            <span class="font-w600 text-success">Approved</span>
                        @else
                            <span class="font-w600 text-danger">Rejected</span>
                        @endif
                      </td>
                      
                      <td class="text-center">
                        <div class="btn-group mr-2 mb-2">
                          @if ($application->approved == 2 || $application->approved == 0)
                            <a href="{{ route('approve', ['id' => $application->id]) }}" data-toggle="tooltip" data-placement="top" title="Approve" 
                              type="button" class="btn btn-outline-primary">
                                <i class="fa fa-fw fa-check"></i>
                            </a>
                          @endif

                          @if ($application->approved == 1 || $application->approved == 0)
                            <a href="{{ route('reject', ['id' => $application->id]) }}" data-toggle="tooltip" data-placement="top" title="Reject" 
                              type="button" class="btn btn-outline-primary">
                                <i class="fa fa-fw fa-times"></i>
                            </a>
                          @endif

                          @if (!$application->approved == 0)
                            <a href="{{ route('pending', ['id' => $application->id]) }}" data-toggle="tooltip" data-placement="top" title="Pending" 
                              type="button" class="btn btn-outline-primary">
                                <i class="fa fa-fw fa-undo"></i>
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
