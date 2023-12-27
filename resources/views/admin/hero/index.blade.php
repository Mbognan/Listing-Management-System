@extends('admin.layouts.master')


@section('contents')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Hero</a></div>
            <div class="breadcrumb-item">Edit Hero Section</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-primary" >Hero Section</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="avatar">Background Image</label>
                                        <div id="image-preview" class="image-preview background-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="background" id="image-upload" />
                                            <input type="hidden" name="old_background" value="{{ @$hero->background }}" >
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-danger">*</span></label>
                                        <input id="title" type="text" name="title" class="form-control"  value="{{ @$hero->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_title">Subtitle<span class="text-danger">*</span></label>
                                        <textarea id="sub_title" type="text" name="sub_title" class="form-control" >{!! @$hero->subtitle !!}</textarea>
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


</section>
@endsection
@push('scripts')
<script>
        $(document).ready(function() {

            $('.background-preview').css({
                'background-image' : 'url({{  asset(@$hero->background) }})',
                'background-size':'cover',
                'background-position': 'center center'
            });
        });


</script>
@endpush

