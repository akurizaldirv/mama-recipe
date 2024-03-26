@extends('layouts.app')

@section('content')
<header class=" hero">
        <div class="overlay"></div>
        <div class="text-center text">
            <h1 class="display-4 text-warning fw-bolder">Mama's Recipe</h1>
            <p class="lead fw-600 fs-4 mb-0 text-white">Tradisi Rasa, Warisan Keluarga</p>
        </div>
</header>
<div class="container">
    <a href="/add">
        <button class="btn btn-warning mb-3 mt-5">Tambah Resep</button>
    </a>

    <div class="row">        
        @foreach ($data as $item)
        <div class="col-4 mb-3 mb-2">
            <div class="card">
                <div class="card-header">
                    <img src="{{asset('img/icon/user-black.png')}}" alt="posted_by" width="13px">
                  {{ $item['postedBy'] }}
                </div>
                <div class="card-body">
                  <h5 class="card-title fw-bold">{{ $item['title'] }} </h5>
                  <p class="card-text">{{ Str::substr($item["description"], 0, 200) }}</p>
                  <a href="/recipe/{{$item['id']}}" class="btn btn-primary">Buka Resep</a>
                </div>
              </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
