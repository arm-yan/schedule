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
                                                <ul>
                                                    @foreach($class->lessons($week->id) as $lesson)
                                                        <li>{{ $lesson->title }} - {{ $lesson->teacher->name }} ({{ $lesson->from }} - {{ $lesson->to }})</li>
                                                    @endforeach
                                                </ul>
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
