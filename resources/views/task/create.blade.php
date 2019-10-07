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
                                <h3 class="mb-0">{{ __('Create a new task') }}</h3>
                            </div>
                            
                        </div>
                    </div>
                    <div id="box">
                    <form method="post" action="{{ action('TaskController@store') }}" autocomplete="on">
                            @csrf
                            
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="title">{{ __('Name of the task') }}</label>
                                    <input type="text" id="title" name="title"  class="form-control form-control-alternative" placeholder="{{ __('Name of the task') }}" value="" required>
                                </div>
                        <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">{{ __('Name of the User') }}</label>
                                    <input type="text" id="name" name="name"  class="form-control form-control-alternative" placeholder="{{ __('Name of the task') }}" value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="due_date">{{ __('Date of the task') }}</label>
                                    <input type="date" id="due_date" name="due_date"  class="form-control form-control-alternative" placeholder="{{ __('Date  of the task') }}" value="" required>
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