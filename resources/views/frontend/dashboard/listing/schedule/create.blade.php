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
                            <h4><a href="{{ route('user.listing-scedule.index',$listingId) }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>  Create Schedule  </h4>
                            <form action="{{ route('user.listing-scedule.store', $listingId) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="name">Day<span class="text-danger">*</span></label>
                                <select name="day" id="" class="form-control selectric">
                                    <option value="">Choose</option>
                                    @foreach (config('schedule.days') as $day)
                                        <option value="{{ $day }}">{{ $day }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Opening Time<span class="text-danger">*</span></label>
                                    <input name="start_time" type="text" class="form-control timepicker">

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="name">Closing Time<span class="text-danger">*</span></label>
                                        <input name="end_time" type="text" class="form-control timepicker">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="name">Status<span class="text-danger">*</span></label>
                                <select name="status" id="" class="form-control selectric">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>





                            <div class="form-group">
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

    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
          $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '11',
            startTime: '10:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endpush
