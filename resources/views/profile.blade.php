@extends('layout.master')

@section('content')
    <div class="container">
        <div class="col-sm-6 offset-sm-3 row justify-content-center bg-white">
            @include('profileInfo')
            @if(auth()->id() == $user->id)
            @include('writeSomething')
            @endif
            <div class="posts" style="width: 100%" page="profile">
                @foreach($posts as $post)
                    @include('post',compact('post'))
                @endforeach
            </div>
        </div>
    </div>

@endsection
