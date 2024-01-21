@extends('frontend.layouts.master')
@push('styles')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
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
                            <h4> Update Schedule ({{ $scedule->day }})   </h4>
                            <form action="{{ route('user.listing-scedule.update', $scedule->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Day<span class="text-danger">*</span></label>
                                    <select name="day" id="" class="form-control selectric">
                                        <option value="">Choose</option>
                                        @foreach (config('schedule.days') as $day)
                                            <option @selected($day === $scedule->day) value="{{ $day }}">
                                                {{ $day }}</option>
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
                                    <button type="submit" class="read_btn mt-4">Update</button>

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
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
