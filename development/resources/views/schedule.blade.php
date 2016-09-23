@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.0/fullcalendar.min.css" rel="stylesheet">
<link media="print" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.0/fullcalendar.print.css" rel="stylesheet">
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.0.0/fullcalendar.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Schedule</div>

                <div class="panel-body">
                    {!! $calendar->calendar() !!}
    				{!! $calendar->script() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
