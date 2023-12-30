@extends('admin.layouts.master')


@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Location</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.location.index') }}">Location</a></div>
                <div class="breadcrumb-item">Create Location Section</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary">Location Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.location.update',$location->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')



                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input id="name" type="text" name="name" class="form-control" value="{{ $location->name }}">
                                </div>


                                <div class="form-group">
                                    <label for="name">Show at Home<span class="text-danger">*</span></label>
                                    <select name="show_at_home" id="" class="form-control">
                                        <option @selected($location->show_at_home === 1) value="1">Yes</option>
                                        <option @selected($location->show_at_home === 0) value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Status<span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control">
                                        <option @selected($location->status === 1) value="1">Active</option>
                                        <option @selected($location->status === 0) value="0">Inactive</option>
                                    </select>
                                </div>





                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
@push('scripts')

@endpush
