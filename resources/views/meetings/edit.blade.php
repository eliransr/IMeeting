@extends('layouts.app')

@section('content')
@include('layouts.headers.list')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Edit your meeting') }}</h3>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{ action('MeetingController@update',$meeting->id) }}" autocomplete="on">
                            @csrf
                            @method('PATCH')

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="title">{{ __('Name of the meeting') }}</label>
                                    <input type="text" name="title"  class="form-control form-control-alternative" placeholder="{{ __('Name of the meeting') }}" value="{{$meeting->title}}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="date">{{ __('Date of the meeting') }}</label>
                                    <input type="date" name="date"  class="form-control form-control-alternative" placeholder="{{ __('Date  of the meeting') }}" value="{{$meeting->date}}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="hour">{{ __('Hour of the meeting') }}</label>
                                    <input type="time" name="hour"  class="form-control form-control-alternative" placeholder="{{ __('Hour of the meeting') }}" value="{{$meeting->hour}}" >
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4" value="Update">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                  

                    
                    
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection