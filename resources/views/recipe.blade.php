@extends('layouts.app')

@section('content')
    <div class="recipe-title">
        <div class="overlay"></div>
        <div class="text">
            <h1 class="fw-bold">{{ $data['title'] }}</h1>
            <div class="detail">
                <img src="{{asset('img/icon/calendar.png')}}" alt="postedAt" class="icon me-1">
                <span>{{ Str::substr($data['created_at'], 0, 11) }}</span>
        
                <img src="{{asset('img/icon/user.png')}}" alt="postedBy" class="icon ms-5 me-1">
                <span>{{ $data['user'] }}</span>    
            </div>
        </div>
    </div>

    <div class="container mb-5">    
        <div class="box">
            <h3>Description</h3>
            <p>{{ $data['description'] }}</p>
        </div>
        <div class="box">
            <h3>Ingredients</h3>
            <p>{{ $data['ingredients'] }}</p>
        </div>
        <div class="box">
            <h3>Step by Step</h3>
            <p>{{ $data['steps'] }}</p>
        </div>
        <div class="action">
            <a href="/"><button class="btn btn-primary">Lihat Resep Lainnya</button></a>
        </div>

    </div>
@endsection