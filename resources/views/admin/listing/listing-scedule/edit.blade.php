@extends('admin.layouts.master')


@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Update Scedule</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">Scedule</a></div>
                <div class="breadcrumb-item">Update Scedule Section</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-primary">Scedule Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.listing-scedule.update',$scedule->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Day<span class="text-danger">*</span></label>
                                    <select name="day" id="" class="form-control selectric">
                                        <option value="">Choose</option>
                                        @foreach (config('schedule.days') as $day )
                                        <option @selected($day === $scedule->day) value="{{ $day }}">{{ $day }}</option>

                                        @endforeach


                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Opening Time<span class="text-danger">*</span></label>
                                        <input name="start_time" type="text" class="form-control timepicker-1">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="name">Closing Time<span class="text-danger">*</span></label>
                                            <input name="end_time" type="text" class="form-control timepicker-2">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="name">Status<span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-control selectric">
                                        <option @selected($scedule->status === 1) value="1">Active</option>
                                        <option @selected($scedule->status === 0) value="0">Inactive</option>
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
$('.timepicker-1').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '{{ $scedule->start_time }}',
    startTime: '10:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true
});
$('.timepicker-2').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '{{ $scedule->end_time }}',
    startTime: '10:00',
    dynamic: true,
    dropdown: true,
    scrollbar: true
});
</script>
@endpush
