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
                                <h3 class="mb-0">{{ __('Create a new meeting') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('meetings.create') }}" class="btn btn-sm btn-primary">{{ __('Add Meeting') }}</a>
                            </div>
                        </div>
                    </div>
                    <div id="box">
                    <form method="post" action="{{ action('MeetingController@store') }}" autocomplete="on">
                            @csrf
                            

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="name">{{ __('Name of the meeting') }}</label>
                                    <input type="text" name="name"  class="form-control form-control-alternative" placeholder="{{ __('Name of the meeting') }}" value="" required>
                                </div>
                        
                                <div class="form-group">
                                    <label class="form-control-label" for="date">{{ __('Date of the meeting') }}</label>
                                    <input type="date" name="date"  class="form-control form-control-alternative" placeholder="{{ __('Date  of the meeting') }}" value="" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="hour">{{ __('Hour of the meeting') }}</label>
                                    <input type="time" name="hour"  class="form-control form-control-alternative" placeholder="{{ __('Hour of the meeting') }}" value="" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="participants" >{{ __('Participants') }}</label>
                                    <div>
                                    <select class="js-example-basic-multiple" name="participants" multiple="multiple">
                                        <option value="{{Auth::user()->id}}"selected>Myself</option>
                                        @foreach($users as $user)
                                            @if($user->org_id==Auth::user()->org_id && $user->id != Auth::user()->id )          
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>        
                                            @endif
                                        @endforeach
                                    </select>
                                    </div>        
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="topic_title">{{ __('Topics') }}</label>
                                    <input type="text" name="topic_title[]"  class="form-control form-control-alternative" placeholder="{{ __('Topics of the meeting') }}" value="" required><br>
                                    <input type="time" name="topic_hour[]"  class="form-control form-control-alternative"  value="" required>

                                </div>
                                

                                <div id='topics'>

                                </div>
                                <div  id ="add">
                                <a class="btn btn-info mt-2" >{{ __('Add topic') }}</a>
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

        <script>

                function createTicketComponent(type) {
                type = type || null;
                
                var elements   = [],
                    rootElement = document.createElement('tr');
                        
                elements.push('<label class="form-control-label" for="topic">{{ __('Topics') }}</label><input type="text" name="topic_title[]"  class="form-control form-control-alternative" placeholder="{{ __('Topics of the meeting') }}" value="" required><br>');
                elements.push('<input type="time" name="topic_hour[]"  class="form-control form-control-alternative"  value="" required><br>');
                
                    
                rootElement.innerHTML = elements.join('');
                
                return rootElement;
                }


              


                function onClickCreateTicketButton(event) {
                var button    = event.target,
                    container = document.querySelector('#topics'),
                    component;

                
                    component = createTicketComponent();
                

                container.appendChild(component);
                }

                
                var buttonsGroup = document.getElementById('add');
                buttonsGroup.addEventListener('click', onClickCreateTicketButton);



</script>
            
        @include('layouts.footers.auth')
    </div>
@endsection