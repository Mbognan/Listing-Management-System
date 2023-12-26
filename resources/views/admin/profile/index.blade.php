@extends('admin.layouts.master')


@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Posts</a></div>
                <div class="breadcrumb-item">Create New Post</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary" >Update Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Avatar</label>
                                            <div id="image-preview" class="image-preview avatar-preview" >
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="avatar" id="image-upload" />
                                                <input type="hidden" name="old_avatar" value="{{ $user->avatar }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Banner</label>
                                            <div id="image-preview-2" class="image-preview banner-preview">
                                                <label for="image-upload-2" id="image-label-2">Choose File</label>
                                                <input type="file" name="banner" id="image-upload-2" />
                                                <input type="hidden" name="old_banner" value="{{ $user->banner }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar" >Name<span class="text-danger" >*</span></label>
                                            <input type="text" name="name" class="form-control"  value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Email<span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Phone<span class="text-danger">*</span></label>
                                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Address<span class="text-danger">*</span></label>
                                            <input type="text" name="address" class="form-control" value="{{ $user->address  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="avatar">About<span class="text-danger">*</span></label>
                                            <textarea name="about" class="form-control" cols="30" rows="10">{!! $user->about !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Website</label>
                                            <input type="text" name="website" class="form-control" value="{{ $user->website }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Facebook</label>
                                            <input type="text" name="fb_link" class="form-control" value="{{ $user->fb_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Instagram</label>
                                            <input type="text" name="insta_link" class="form-control" value="{{ $user->insta_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">X</label>
                                            <input type="text" name="x_link" class="form-control" value="{{ $user->x_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="avatar">Git Hub</label>
                                            <input type="text" name="git_link" class="form-control" value="{{ $user->git_link }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>

                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                     <div class="card-header">
                        <h4 class="text-danger" >Reset Password</h4>
                     </div>
                     <div class="card-body">
                        <form action="{{ route('admin.update.password') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                       <button class="btn btn-danger" type="submit" >Reset Password</button>
                                    </div>
                                </div>
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

        $(document).ready(function() {
            let avatarUri = "{{ asset($user->avatar) }}"
            $('.avatar-preview').css({
                'background-image' : 'url('+avatarUri+')',
                'background-size':'cover',
                'background-position': 'center center'
            });
        });

        $(document).ready(function() {
            let bannerUri = "{{ asset($user->banner) }}"
            $('.banner-preview').css({
                'background-image' : 'url('+bannerUri+')',
                'background-size':'cover',
                'background-position': 'center center'
            });
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
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
