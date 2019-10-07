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
                                <h3 class="mb-0">{{ __('Edit your topic') }}</h3>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{ action('TopicController@update',$topic->id) }}" autocomplete="on">
                            @csrf
                            @method('PATCH')

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="topic_title">{{ __('Name of the topic') }}</label>
                                    <input type="text" name="topic_title"  class="form-control form-control-alternative" placeholder="{{ __('Name of the topic') }}" value="{{$topic->topic_title}}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="topic_hour">{{ __('Hour of the topic') }}</label>
                                    <input type="time" name="topic_hour"  class="form-control form-control-alternative" placeholder="{{ __('Hour of the topic') }}" value="{{$topic->topic_hour}}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="topic_hour">{{ __('Mark as Done ??') }}</label>
                                    <select name="status"  class="form-control form-control-alternative">
                                        <option >1</option>
                                        <option> undone</option>
                                    </select>
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