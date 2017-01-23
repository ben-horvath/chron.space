@extends('layouts.app')

@section('content')
<div class="container job-index">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <h1>Your Jobs for the Week</h1>

                @foreach($user->jobs as $job)
                    <button type="button" class="btn btn-primary btn-lg">
                        {{ $job->name }}<br>
                        {{ $job->hours }}
                    </button>
                @endforeach

                <!-- <button type="button" class="btn btn-default btn-lg">+</button> -->
                
                <form method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Job Name" value="{{ old('name') }}">
                        <input type="text" name="hours" class="form-control" placeholder="Hours for the Week" value="{{ old('hours') }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

                @if(count($errors))
                    @foreach($errors->all() as $error)
                        <p class="bg-danger">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
