@extends('admin.layouts/app')

@section('main-content')

     <!-- Main Container -->
     <main id="main-container">
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('{{ Storage::disk('public')->url($application->image_url) }}');">
            <div class="bg-black-75">
                <div class="content content-full text-center">
                    <div class="my-3">
                        <img class="img-avatar img-avatar-thumb"
                        src="{{ Storage::disk('public')->url($application->image_url) }}" 
                        alt="{{ $application->title }}">
                    </div>
                    <h2 class="h3 font-w400 text-white-75">
                        {{ $user->name }}
                    </h2>
                    <span class="bg-white p-2 text-black rounded">
                        @if ($application->approved === 0)
                            <span class="font-w600 text-info">Pending</span>
                        @elseif ($application->approved === 1)
                            <span class="font-w600 text-success">Approved</span>
                        @elseif ($application->approved === 3)
                            <span class="font-w600 text-secondary">Sponsored</span>
                        @else
                            <span class="font-w600 text-danger">Rejected</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-boxed">
            <!-- User Profile -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Application Detail</h3>
                </div>
                <div class="block-content">
                     <div class="row push">
                            <div class="col-lg-9 col-xl-9">
                                <div class="col-12">
                                    <p class="h4 w400 text-muted">Title</p>
                                    <p>{{ $application->title }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="h4 w400 text-muted">Target Amount</p>
                                    <p>&#x20B5; {{ $application->target_amount }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="h4 w400 text-muted">Amount Gained</p>
                                    <p>&#x20B5; {{ $application->amount_gained }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="h4 w400 text-muted">Description</p>
                                    <p>{{ $application->description }}</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="col-12">
                                    <p class="h5 text-muted">Progress</p>
                                    <div class="progress push">
                                        <div class="progress-bar progress-bar-striped rounded bg-success" role="progressbar" 
                                        style="width: {{ round(($application->amount_gained / $application->target_amount) * 100) }}%;" 
                                        aria-valuenow="{{ round(($application->amount_gained / $application->target_amount) * 100) }}" 
                                        aria-valuemin="0" aria-valuemax="100">
                                            <span class="font-size-sm font-w600">
                                                {{ round(($application->amount_gained / $application->target_amount) * 100) }}%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="h5 text-muted">Actions</p>
                                        @if ($application->approved == 2 || $application->approved == 0)
                                            <div class="mr-2 mb-2">
                                                <a href="{{ route('approve', ['id' => $application->id]) }}"
                                                type="button" class="btn btn-outline-primary">
                                                    <i class="fa fa-fw fa-check mr-1"></i> Approve
                                                </a>
                                            </div>
                                        @endif
                                        
                                        @if ($application->approved == 1 || $application->approved == 0)
                                            <div class="mr-2 mb-2">
                                                <a href="{{ route('reject', ['id' => $application->id]) }}" 
                                                type="button" class="btn btn-outline-primary">
                                                    <i class="fa fa-fw fa-times mr-1"></i> Reject
                                                </a>
                                            </div>
                                        @endif

                                        @if (!$application->approved == 0)
                                            <div class="mr-2 mb-2">
                                                <a href="{{ route('pending', ['id' => $application->id]) }}"
                                                type="button" class="btn btn-outline-primary">
                                                    <i class="fa fa-fw fa-undo mr-1"></i> Pending
                                                </a>
                                            </div>
                                        @endif

                                        @if (!($application->approved == 3) && $application->approved == 1)
                                            <div class="mr-2 mb-2">
                                                <a href="{{ route('sponsored', ['id' => $application->id]) }}"
                                                    type="button" class="btn btn-outline-primary">
                                                    <i class="fa fa-fw fa-gift mr-1"></i> Sponsored
                                                </a>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- END User Profile -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection
