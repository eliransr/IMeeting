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
                                <h3 class="mb-0">{{ __('Edit your task') }}</h3>
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{ action('TaskController@update',$task->id) }}" autocomplete="on">
                            @csrf
                            @method('PATCH')

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="title">{{ __('Task Name') }}</label>
                                    <input type="text" name="title"  class="form-control form-control-alternative" placeholder="{{ __('Name of the task') }}" value="{{$task->title}}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="due_date">{{ __('Task Due Date') }}</label>
                                    <input type="date" name="due_date"  class="form-control form-control-alternative" placeholder="{{ __('Due date of the task') }}" value="{{$task->due_date}}" >
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="topic_hour">{{ __('Status') }}</label>
                                    <select name="status"  class="form-control form-control-alternative">
                                        <option >1</option>
                                        <option> undone</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="name">{{ __('Assigned Employee') }}</label>
                                    <input type="text" name="name"  class="form-control form-control-alternative" placeholder="{{ __('Operations name') }}" value="{{$task->name}}" >
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