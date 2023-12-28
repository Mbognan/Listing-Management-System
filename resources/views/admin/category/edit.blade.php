@extends('admin.layouts.master')


@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Edit</a></div>
                <div class="breadcrumb-item">Edit Category Section</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary">Edit Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image-label">Icon Image</label>
                                            <div id="image-preview" class="image-preview image-icon">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image_icon" id="image-upload" />
                                                <input type="hidden" name="old_icon" value="{{ $category->image_icon }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image-label">Background Image</label>
                                            <div id="image-preview-2" class="image-preview background-image">
                                                <label for="image-upload-2" id="image-label-2">Choose
                                                    File</label>
                                                <input type="file" name="background_image"
                                                    id="image-upload-2" />
                                                    <input type="hidden" name="old_background" value="{{ $category->background_image }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input id="name" type="text" name="name" class="form-control" value="{{ $category->name }}">
                                </div>


                                <div class="form-group">
                                    <label for="name">Show at Home<span class="text-danger">*</span></label>
                                    <select name="show_at_home" id="" class="form-control">
                                        <option @selected($category->show_at_home === 1) value="1">Yes</option>
                                        <option @selected($category->show_at_home === 0) value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Status<span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control">
                                        <option @selected($category->status === 1) value="1">Active</option>
                                        <option @selected($category->status === 0) value="0">Inactive</option>
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

<script>
       $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {
            let avatarUri = "{{ asset($category->image_icon) }}"
            $('.image-icon').css({
                'background-image' : 'url('+avatarUri+')',
                'background-size':'cover',
                'background-position': 'center center'
            });
        });

        $(document).ready(function() {
            let bannerUri = "{{ asset($category->background_image) }}"
            $('.background-image').css({
                'background-image' : 'url('+bannerUri+')',
                'background-size':'cover',
                'background-position': 'center center'
            });
        });
</script>
@endpush
