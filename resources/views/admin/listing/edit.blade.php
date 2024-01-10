@extends('admin.layouts.master')


@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Listing</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">Listing</a></div>
                <div class="breadcrumb-item">Edit Listing Section</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary">Listing Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing.update',$listing->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image-label">Image</label>
                                            <div id="image-preview" class="image-preview preview-1">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" />
                                                <input type="hidden" name="old_image" value="{{ $listing->image }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image-label">Thumbnail Image</label>
                                            <div id="image-preview-2" class="image-preview preview-2">
                                                <label for="image-upload-2" id="image-label-2">Choose
                                                    File</label>
                                                <input type="file" name="thumbnail_image" id="image-upload-2" />
                                                <input type="hidden" name="old_thumbnail" value="{{ $listing->thumbnail_image }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input id="title" type="text" name="title" class="form-control" value="{{ $listing->title }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Category</label>
                                            <select name="category" id="categoryId" class="form-control" >
                                                <option>Select</option>
                                                @foreach ($categories as $category)
                                                    <option @selected($category->id === $listing->category_id) value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Location</label>
                                            <select name="location" id="locationId" class="form-control">
                                                <option>Select</option>
                                                @foreach ($locations as $location)
                                                    <option  @selected($location->id === $listing->location_id) value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control">{{ isset($listing->address)? $listing->address: 'no address' }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone<span class="text-danger">*</span></label>
                                            <input id="phone" type="text" name="phone" class="form-control" value="{{ $listing->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email<span class="text-danger">*</span></label>
                                            <input id="email" type="text" name="email" class="form-control" value="{{ $listing->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input id="website" type="text" name="website" class="form-control" value="{{ $listing->website }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fb_link">Facebook</label>
                                            <input id="fb_link" type="text" name="fb_link" class="form-control" value="{{ $listing->fb_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="insta_link">Instagram</label>
                                            <input id="insta_link" type="text" name="insta_link"
                                                class="form-control" value="{{ $listing->insta_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="x_link">X</label>
                                            <input id="x_link" type="text" name="x_link" class="form-control" value="{{ $listing->x_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="git_link">Github</label>
                                            <input id="git_link" type="text" name="git_link" class="form-control" value="{{ $listing->git_link }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        @if($listing->file)

                                             <i class="fas fa-file-alt" style="font-size:70px"></i>

                                        @endif
                                        <div class="form-group">
                                            <label for="">Attachment</label>
                                            <input type="file" class="form-control" name="attachment"/>
                                            <input type="hidden" name="old_attachment" value="{{ $listing->file }}">
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
                                    <label for="address">Description</label>
                                    <textarea  class="summernote" name="description">{{ isset($listing->description) ? $listing->description: '' }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Google Map Embed Code</label>
                                    <textarea name="google_map_embed" class="form-control">{{ isset($listing->google_map_embed_code)? $listing->google_map_embed_code: 'no map embed' }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="seo_title">Seo Title</label>
                                    <input id="seo_title" type="text" name="seo_title"
                                        class="form-control" value="{{ $listing->seo_title }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Seo Description</label>
                                    <textarea name="seo_description" class="form-control">{{ isset($listing->seo_description) ? $listing->seo_description: '' }}</textarea>
                                </div>




                               <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option  @selected($listing->status === 1) value="1">Active</option>
                                            <option  @selected($listing->status === 0) value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Is Featured</label>
                                        <select name="is_featured" id="" class="form-control">
                                            <option  @selected($listing->is_featured === 1) value="1">Yes</option>
                                            <option  @selected($listing->is_featured === 0) value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Is Verified</label>
                                        <select name="is_verified" id="" class="form-control">
                                            <option  @selected($listing->is_verified === 1) value="1">Yes</option>
                                            <option  @selected($listing->is_verified === 0) value="0">No</option>
                                        </select>
                                    </div>
                                </div>
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
          var listingAmenities = @json($listingAmenities);
        $(document).ready(function() {
            $('.select2').select2().val(listingAmenities).trigger('change');
        });
        $(document).ready(function() {
        $('.categoryId').select2();
        $('.locationId').select2();
    });
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
            let avatarUri = "{{ asset($listing->image) }}"
            $('.preview-1').css({
                'background-image' : 'url('+avatarUri+')',
                'background-size':'cover',
                'background-position': 'center center'
            });
        });

        $(document).ready(function() {
            let bannerUri = "{{ asset($listing->thumbnail_image) }}"
            $('.preview-2').css({
                'background-image' : 'url('+bannerUri+')',
                'background-size':'cover',
                'background-position': 'center center'
            });
        });
    </script>
@endpush

