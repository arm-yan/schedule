@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">
                {!! session('message') !!}
            </div>
        @endif
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
                                                <button type="button" data-week="{{$week->id}}" data-class="{{$class->id}}" class="btn btn-primary add_record">
                                                    Add
                                                </button>
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
    <div class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="post" action="{{route('post.schedule')}}">
                    <div class="modal-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Ooops,</strong> Something went wrong.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <input placeholder="Title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <input placeholder="Starts" type="text" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ old('from') }}" required autofocus>
                                @error('from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input placeholder="Ends" type="text" class="form-control @error('to') is-invalid @enderror" name="to" value="{{ old('to') }}" required autofocus>
                                @error('to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <select name="user_id" class="form-control @error('to') is-invalid @enderror">
                                    <option value="">Select teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="week_id" name="week_id" value="{{ old('week_id', 0) }}">
                                <input type="hidden" id="class_id" name="class_id" value="{{ old('class_id', 0) }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $( document ).ready(function() {
            $('.add_record').on('click', function () {
                $('#week_id').val($(this).data('week'));
                $('#class_id').val($(this).data('class'));
                $('#scheduleModal').modal('show');
            })
            @if (count($errors) > 0)
                $('#scheduleModal').modal('show');
            @endif
        });
    </script>
@endsection
