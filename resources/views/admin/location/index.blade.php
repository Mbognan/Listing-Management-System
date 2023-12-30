@extends('admin.layouts.master')


@section('contents')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Location</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.category.create') }}">Create Location</a></div>
            <div class="breadcrumb-item">All Location Section</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-primary" >All Location</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.location.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}

                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

