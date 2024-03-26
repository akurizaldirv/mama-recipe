@extends('layouts.app')

@section('content')
    <div class="container mini-container">
        <h1 align=center>Update {{ $data['title'] }}</h1>
        <form class="mt-4" method="POST" action="/update" id="inputRecipe">
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            @csrf
            <div class="mb-3">
              <label for="inputTitle" class="form-label">Title</label>
              <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $data['title'] }}">
            </div>
            <div class="mb-3">
              <label for="inputEmail" class="form-label">Description</label>
              <input type="text" class="form-control" id="inputDescription" name="description" value="{{ $data['description'] }}">
            </div>
            <div class="mb-3">
              <label for="inputIngredients" class="form-label">Ingredients</label>
              <textarea class="form-control" id="inputIngredients" aria-describedby="IngredientsHelp" name="ingredients" value="{{ $data['ingredients'] }}"></textarea>
              <div id="IngredientsHelp" class="form-text">write in separate line</div>
            </div>
            <div class="mb-3">
              <label for="inputSteps" class="form-label">Step by Step</label>
              <textarea class="form-control" id="inputSteps" name="steps"  value="{{ $data['steps'] }}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
          var textarea = document.getElementById("inputIngredients");
          textarea.value = "{{ $data['ingredients'] }}";

          var textarea2 = document.getElementById("inputSteps");
          textarea2.value = "{{ $data['steps'] }}";
      });
  </script>
@endsection