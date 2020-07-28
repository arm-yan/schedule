@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($classes as $class)
            <div class="row justify-content-center mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ $class->title  }}</div>

                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach($weekdays as $week)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-header">{{ $week->title  }}</div>
                                            <div class="card-body">
                                                @foreach($class->lessons($week->id) as $lesson)
                                                    {{ $lesson->title }} @if($lesson->teacher) - {{ $lesson->teacher->name }} @endif | {{ $lesson->from }} - {{ $lesson->to }}<br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
