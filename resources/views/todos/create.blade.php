@extends('layouts.app')
@section('title', 'create a new todo')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
        <form action="{{route('todos.store')}}" method="post">
            <div class="card">
<div class="card-header text-center">Create a new Todo</div>
          <div class="card-body">

<div class="form-group">
                <label for="title">Title:</label>
                <input name="title" id="title"  class="form-control">
                 @error('title') <li class="text-danger">{{$message}}</li> @enderror
              </div>
 @csrf
     <div class="form-group">
       <label for="description">Description:</label>
      <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
        @error('description') <li class="text-danger">{{$message}}</li> @enderror
     </div>
     <div class="form-group">
         <label for="time">Choose time:</label>
         <input type="time" name="time" id="time" class="form-control">
     </div>
     <div class="form-group">
         <label for="date">Choose date:</label>
         <input type="date" name="date" id="date" class="form-control">
     </div>
<div class="form-group">
    <label for="category">Choose a category:</label>
    <select name="category" id="category" class="form-control">
    <option value="personal" >Personal</option>
    <option value="office">Office</option>
    <option value="school">School</option>
    <option value="church">Church</option>
</select></div>
     <div class="form-group">
         <input type="submit" value="Create Todo" class="btn btn-primary">
     </div>
    </div>
    <div class="card-footer p-3 text-center">
     copyright  &copy; 2019 - {{ date('Y') }} <ins>Sunshinecoder</ins> Smart-Todo
    </div>
    </div>

    </form>
    </div>
    </div>

@endsection
