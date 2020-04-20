@extends('layouts.app')
@section('title', 'Todos')
    @section('content')
    <div class="row justify-content-center">
     <div class="col-md-8 my-5">
  <div class="card">
           @include('layouts.msg')
<div class="card-header  text-capitalize"><h5 class="text-center"> <b >{{$todo->title}}</b></h5>
    <p class="text-success"> Time: {{ $todo->time }}    <br>
        Date: {{ $todo->date }}  <br>
         Category: {{ $todo->category }}
    </p>

</div>
  <div class="card-body ">{{$todo->description}} <br>
  <div class="my-5">
    <form method="POST" action="{{route('todos.destroy', $todo->id)}}">
        @method('DELETE')
        @csrf

        <input type="submit" value="Delete" class="btn btn-danger float-left">
        </form>
         <a href="/todos/{{$todo->id}}/edit" class="btn btn-info ml-2"> Edit </a>
      @if ($todo->completed == true)
        <a href="#" class="btn btn-warning  ml-2"> Completed</a>
        @elseif($todo->completed == false)
        <a href="/todos/{{$todo->id}}/complete" class="btn btn-warning  ml-2">Mark as completed</a>

        @else
        @endif
  </div>

</div>
</div>
    </div>
    </div>
@endsection
