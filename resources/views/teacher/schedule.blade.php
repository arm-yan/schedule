@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($weekdays as $week)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header">{{ $week->title  }}</div>
                        <div class="card-body">
                            @foreach($teacher->lessons($week->id) as $lesson)
                                {{ $lesson->title }} - {{ $lesson->classes->title }} | {{ $lesson->from }} - {{$lesson->to}}<br>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
