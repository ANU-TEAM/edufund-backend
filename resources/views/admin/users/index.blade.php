@extends('admin.layouts/app')
@section('main-content')



<main id="main-container">
<!-- Page Content -->
<div class="content content-narrow">
    <div class="row row-deck">
    <div class="col-lg-12">
        <!-- Contextual Table -->
        <div class="block block-mode-loading-oneui">
            <div class="block-header block-header-default">
            <h3 class="block-title">All Admins</h3>
            <div class="block-options">
                <a href="{{ route('admin.users.create') }}" class="btn btn-md btn-primary"
                data-toggle="tooltip" title="Add Admin">
                <i class="si si-plus"></i>
                </a>
            </div>
            </div>
            <div class="block-content block-content-full">
            <table class="table table-responsive-sm table-border table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                <thead class="thead-light">
                <tr class="text-uppercase">
                    <th class="font-w700" style="width: 50px;">#</th>
                    <th class="font-w700">Name</th>
                    <th class="font-w700" style="width: 65%;">Email</th>
                    <th class="text-center font-w700">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($admins as $admin)
                    <tr>
                    <th class="text-left" scope="row">
                        {{ $loop->index + 1 }}
                    </th>
                    <td class="font-w600 font-size-sm">{{ $admin->name }}</td>
                    <td class="font-w400 font-size-sm">{{ $admin->email }}</td>
                    <td class="text-center">
                        <form action="{{ route('admin.users.remove', ['email' => $admin->email]) }}"
                        method="POST">
                            @csrf
                            
                            <div class="btn-group mr-2 mb-2">
                            <button type="submit" {{ (Auth::id() == $admin->id) ? 'disabled' : '' }}
                                data-toggle="tooltip" data-placement="top" title="Remove Admin" 
                                type="button" class="btn btn-outline-danger">
                                <i class="fa fa-fw fa-user-times"></i>
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


@endsection