@extends('layouts.app')
@section('title', 'Todos')
    @section('content')
    @if (count($todo)> 0)
    <div class="row justify-content-center">
     <div class="col-md-8">
        <div class=" my-5 card ">
                 @include('layouts.msg')
   <div class=" card-header "> <h4 class="text-center m-0 p-0"><b><ins>Saved Todos</ins></b></h4>
        <p>                 <a href="/todos/create" class="text-link btn-sm ">Add new Todos</a>
<br>
<a href="/todos/completed" class="text-link btn-sm mt-1">Show completed Todos</a>

</p>
            </div>
                  @foreach ($todo as $item)
     <div class="card-body">
    <li class="list-group-item">     {{$item->title}}
        @if ($item->completed == true)
        <a href="#" class="btn btn-warning float-right ml-2 btn-sm"> Completed</a>
        @endif
                  <a href="/todos/{{$item->id}}" class="btn btn-info float-right btn-sm ">View</a>
        </li>
     </div>


     @endforeach
       <div class="ml-3">  {{ $todo->links() }}</div>
 <div class="card-footer p-3 text-center">
        copyright  &copy; 2019 - {{ date('Y') }} <ins>Sunshinecoder</ins> Smart-Todo
       </div>
     </div>
    </div>
</div>
@else
<div class="my-5">
<div class="jumbotron text-center m-0 p-5">
    <h4 class="text-danger">No saved Todos !</h4>
    <a href="/todos/create" class="btn btn-warning">Add Todos</a>

</div>
<div class="card-footer   p-3 text-center m-0">
    copyright  &copy; 2019 - {{ date('Y') }} <ins>Sunshinecoder</ins> Smart-Todo
   </div>
</div>
@endif

@endsection
