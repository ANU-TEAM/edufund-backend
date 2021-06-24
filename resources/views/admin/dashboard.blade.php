@extends('admin.layouts/app')

@section('main-content')

  <main id="main-container">

    <!-- Page Content -->
    <div class="content content-narrow">
      <!-- Stats -->
      <div class="row">
        @if (Auth::user()->admin)
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
          <a class="block block-rounded block-link-pop border-left border-info border-4x"
            href="#">
            <div class="block-content block-content-full">
              <div class="font-size-sm font-w600 text-uppercase text-muted">Applications</div>
              <div class="font-size-h2 font-w400 text-dark">{{ $totalApplications }}</div>
            </div>
          </a>
        </div>
        @endif

        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
          <a class="block block-rounded block-link-pop border-left border-success border-4x"
            href="#">
            <div class="block-content block-content-full">
              <div class="font-size-sm font-w600 text-uppercase text-muted">Approved({{ $approved }})</div>
              <div class="font-size-h2 font-w400 text-dark">
                {{ round(($approved / $totalApplications) * 100) }}%
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
          <a class="block block-rounded block-link-pop border-left border-primary border-4x"
            href="#">
            <div class="block-content block-content-full">
              <div class="font-size-sm font-w600 text-uppercase text-muted">Pending({{ $pending }})</div>
              <div class="font-size-h2 font-w400 text-dark">
                 {{ round(($pending / $totalApplications) * 100) }}%
              </div>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
          <a class="block block-rounded block-link-pop border-left border-danger border-4x"
            href="#">
            <div class="block-content block-content-full">
              <div class="font-size-sm font-w600 text-uppercase text-muted">Rejected({{ $rejected }})</div>
              <div class="font-size-h2 font-w400 text-dark">
                 {{ round(($rejected / $totalApplications) * 100) }}%
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- END Stats -->

      <!-- List of Applicants -->
      <div class="row row-deck">

        <div class="col-lg-12">
          <div class="block block-mode-loading-oneui">
            <div class="block-header block-header-default">
              <h3 class="block-title">Latest Orders</h3>
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
                  @foreach ($applications as $application)
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
