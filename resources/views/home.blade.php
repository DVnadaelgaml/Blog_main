@extends('layout.master')
@section('content')
    <div class="container">
        <div class="col-sm-6 offset-sm-3 row">
            @include('writeSomething')
            <div class="posts">
                @foreach($posts as $post)
                    @include('post',compact('post'))
                @endforeach
            </div>
        </div>
    </div>
@endsection
