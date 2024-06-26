@extends('admin.layouts.master')


@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Amenities</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Amenity</a></div>
                <div class="breadcrumb-item">Update Amenity Section</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary">Amenity Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.amenity.update',$amenity->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image-label">Icon Image<span class="text-danger">*</span></label>
                                            <div role="iconpicker" data-rows="3" data-cols="6" data-align="left"
                                                data-selected-class="btn-primary" data-unselected-class=""
                                                name="icon" data-icon="{{ $amenity->icon }}"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ $amenity->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Status<span class="text-danger">*</span></label>
                            <select name="status" id="" class="form-control">
                                <option  @selected($amenity->status === 1) value="1">Active</option>
                                <option  @selected($amenity->status === 0) value="0">Inactive</option>
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
