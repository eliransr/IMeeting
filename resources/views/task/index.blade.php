@extends('layouts.app')

@section('content')
@include('layouts.headers.list')

  <div class="container-fluid mt--7">
        <div class="row float-right">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Tasks') }}</h3>
                            </div>
                            @cannot('employee')<div class="col-6 text-right">
                                <a href="{{ route('task.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Task') }}</a>
                            </div> @endcannot

                        </div>
                    </div>
                    
                  
               
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Operations Name') }}</th>
                                    <th scope="col">{{ __('Due Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->due_date }}</td>
                                        <td>
                                        @if($task->status == 0)
                                        @can('admin')
                                    
                                        <a href = "{{route('doneTask' , $task->id)}}">Mark as Done</a>
                                        @endcan
                                        @else
                                        <small class="btn btn-success btn-sm" role="alert">Done!</small>
                                        @endif
                            
                                        </td>
                                       @cannot('employee')
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                   
                                                        <form action="{{ route('task.destroy', $task) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('task.edit', $task) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this task?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                    
                                                       
                                                </div>
                                            </div>
                                        </td>
                                        @endcannot
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
<!-- end of code task table -->

<!-- topic table -->


<div class="container-fluid mt--7">
        <div class="row float-left">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Topics') }}</h3>
                            </div>
                            @cannot('employee')<div class="col-6 text-right">
                                <a href="{{ route('topic.create') }}" class="btn btn-sm btn-primary">{{ __('Add New Topic') }}</a>
                            </div> @endcannot

                          

                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Hour') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td>{{ $topic->topic_title }}</td>
                                        <td>{{ $topic->topic_hour }}</td>
                                        <td>
                                        @if($topic->status == 0)
                                        @can('admin')
                                    
                                        <a href = "{{route('done' , $topic->id)}}">Mark as Done</a>
                                        @endcan
                                        @else
                                        <small class="btn btn-success btn-sm" role="alert">Done!</small>
                                        @endif
                                    
                                        </td>
                                       @cannot('employee')
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                   
                                                        <form action="{{ route('topic.destroy', $topic) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('topic.edit', $topic) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this topic?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                    
                                                       
                                                </div>
                                            </div>
                                        </td>
                                        @endcannot
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
            
       
    </div>

<!-- end of code topice table -->


@endsection

