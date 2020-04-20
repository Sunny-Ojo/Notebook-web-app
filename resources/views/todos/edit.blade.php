@extends('layouts.app')
@section('title', 'Update todo')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 my-5">
        <form action="{{route('todos.update',  $todo->id)}}" method="POST" >
            <div class="card">
@method('PUT')
          <div class="card-header text-center">
   Edit Todo
          </div>
            <div class="card-body">
        <div class="form-group">
            <label for="title">Title</label>
        <input name="title" id="title" value="{{$todo->title}}"  class="form-control">

             @error('title') <li class="text-danger">{{$message}}</li> @enderror
          </div>
@csrf
<input type="hidden" name="method" value="PUT">
 <div class="form-group">
   <label for="description">Description</label>
 <textarea name="description"  class="form-control" id="description" cols="30" rows="10">{{$todo->description}}</textarea>
    @error('description') <li class="text-danger">{{$message}}</li> @enderror
 </div>
 <div class="form-group">
    <label for="time">Choose time:</label>
    <input type="time"value="{{$todo->time}}" name="time" id="time" class="form-control" >
    @error('time') <li class="text-danger">{{$message}}</li> @enderror

</div>
<div class="form-group">
    <label for="date">Choose date:</label>
<input type="date" name="date" id="date" class="form-control" value="{{$todo->date}}">
    @error('date') <li class="text-danger">{{$message}}</li> @enderror

</div>
 <div class="form-group">
    <label for="category">Choose a category:</label>
    <select name="category" id="category" class="form-control">
    <option value="personal" >Personal</option>
    <option value="office">Office</option>
    <option value="school">School</option>
    <option value="church">Church</option>
</select></div>
<input type="hidden" method='PUT'>
 <div class="form-group">
     <input type="submit" value="Update Todo" class="btn btn-primary">
 </div>
        </div>
        <div class="card-footer p-3 text-center">
            copyright  &copy; 2019 - {{ date('Y') }} <ins>Sunshinecoder</ins> Smart-Todo
           </div>
        </form>
    </div>
    </div>

    </div>



@endsection
