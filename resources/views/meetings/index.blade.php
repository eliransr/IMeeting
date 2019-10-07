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
                                <h3 class="mb-0">{{ __('Meetings') }}</h3>
                            </div>
                            @cannot('employee')<div class="col-4 text-right">
                                <a href="{{ route('meetings.create') }}" class="btn btn-sm btn-primary">{{ __('Add Meeting') }}</a>
                            </div> @endcannot
                        </div>
                    </div>
                    
                  

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Creator') }}</th>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">{{ __('Hour') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meetings as $meeting)
                                    <tr>
                                        <td>
                                        <a href="{{ route('task') }}">{{ $meeting->title }}</a>
                                        </td>
                                        <td>{{ $meeting->user_id }}</td>
                                        <td>{{ $meeting->date }}</td>
                                        <td>{{ $meeting->hour }}</td>
                                       @cannot('employee')
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                   
                                                        <form action="{{ route('meetings.destroy', $meeting) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('meetings.edit', $meeting) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this meeting?") }}') ? this.parentElement.submit() : ''">
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
@endsection