@extends('admin.layouts/app')

@section('main-content')

  <main id="main-container">

    <!-- Page Content -->
    <div class="content content-narrow">
      <!-- Stats -->
      <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
          <div class="block block-rounded block-link-pop border-left border-info border-4x">
            <div class="block-content block-content-full">
              <div class="font-size-sm font-w600 text-uppercase text-muted">Overall Rating</div>
              <div class="font-size-h2 font-w400 text-dark">{{ number_format($average, 2) }}</div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Stats -->

      <!-- List of Applicants -->
      <div class="row row-deck">

        <div class="col-lg-12">
          <div class="block block-mode-loading-oneui">
            <div class="block-header block-header-default">
              <h3 class="block-title">Latest Feedbacks</h3>
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
                    <th class="font-w700" style="width: 40%;">Comment</th>
                    <th>Rating</th>
                    <th>Date</th>
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
