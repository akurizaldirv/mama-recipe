@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>{{ Auth::user()->name }} Recipe</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1;    
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $counter }}</th>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['created_at'] }}</td>
                        <td>
                            <a href="/recipe/{{$item['id']}}/update">
                                <button class="btn btn-warning">Update</button>
                            </a>
                            <a href="/recipe/{{$item['id']}}/delete">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>      
                    @php
                        $counter++;
                    @endphp
                @endforeach
              
            </tbody>
          </table>
    </div>
@endsection