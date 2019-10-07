@extends('layouts.app')

@section('content')
@include('layouts.headers.list')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-10">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Create a new topic') }}</h3>
                            </div>
                            
                        </div>
                    </div>
                    <div id="box">
                    <form method="post" action="{{ action('TopicController@store') }}" autocomplete="on">
                            @csrf
                            
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="topic_title">{{ __('Name of the topic') }}</label>
                                    <input type="text" name="topic_title"  class="form-control form-control-alternative" placeholder="{{ __('Name of the topic') }}" value="" required>
                                </div>
                        
                                <div class="form-group">
                                    <label class="form-control-label" for="topic_hour">{{ __('Hour of the topic') }}</label>
                                    <input type="time" name="topic_hour"  class="form-control form-control-alternative" placeholder="{{ __('Hour of the topic') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4" value="Save">{{ __('Create') }}</button>
                                </div>
                            </div>
                        </form>
                      </div>
                    
                    
                    
                </div>
            </div>
        </div>

    
        @include('layouts.footers.auth')
    </div>
@endsection