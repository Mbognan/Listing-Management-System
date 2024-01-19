@extends('frontend.layouts.master')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        label {
            margin-top: 15px;
        }
    </style>
@endpush
@section('contents')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>basic information</h4>
                            <form action="{{ route('user.listing.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image-label">Image</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image-label">Thumbnail Image</label>
                                            <div id="image-preview-2" class="image-preview ">
                                                <label for="image-upload-2" id="image-preview-label-2">Choose
                                                    File</label>
                                                <input type="file" name="thumbnail_image" id="image-upload-2" />
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="title">title<span class="text-danger">*</span></label>
                                    <input id="title" type="text" name="title" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Category<span class="text-danger">*</span></label>
                                            <select name="category" id="" class="form-control ">
                                                <option>Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Location<span class="text-danger">*</span></label>
                                            <select name="location" id="" class="form-control ">
                                                <option>Select</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone<span class="text-danger">*</span></label>
                                            <input id="phone" type="text" name="phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email<span class="text-danger">*</span></label>
                                            <input id="email" type="text" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input id="website" type="text" name="website" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fb_link">Facebook</label>
                                            <input id="fb_link" type="text" name="fb_link" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="insta_link">Instagram</label>
                                            <input id="insta_link" type="text" name="insta_link" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="x_link">X</label>
                                            <input id="x_link" type="text" name="x_link" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="git_link">Github</label>
                                            <input id="git_link" type="text" name="git_link" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Attachment<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="attachment" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select2 Multiple</label>
                                    <select class="form-control select2" multiple="" name="amenities[]">
                                        @foreach ($amenities as $amenity)
                                            <option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="address">Description<span class="text-danger">*</span></label>
                                    <textarea class="summernote" name="description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Google Map Embed Code</label>
                                    <textarea name="google_map_embed" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="seo_title">Seo Title<span class="text-danger">*</span></label>
                                    <input id="seo_title" type="text" name="seo_title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Seo Description<span class="text-danger">*</span></label>
                                    <textarea name="seo_description" class="form-control"></textarea>
                                </div>




                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Status<span class="text-danger">*</span></label>
                                            <select name="status" id="" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Is Featured<span class="text-danger">*</span></label>
                                            <select name="is_featured" id="" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Is Verified<span class="text-danger">*</span></label>
                                            <select name="is_verified" id="" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>






                                <div class="col-12">
                                    <button type="submit" class="read_btn mt-4">Create</button>
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
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(".select2").select2();

        $(document).ready(function() {
            $('.summernote').summernote();
        });




        $(document).ready(function() {

        });

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-preview-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
