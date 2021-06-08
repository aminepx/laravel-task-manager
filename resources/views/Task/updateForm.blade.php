@extends('layouts.app1')
@section('content')
   

    <form action="{{route('edit',['id'=>$task->id])}}" method="post">  
        @method('PUT') 
        @csrf
       <div class="form-group col-md-4 mt-5 offset-4">
        <h1 class="text-center m-4 text-secondary">Update task: {{$task->title}}</h1>
        <div class="d-flex ">
            <input type="text" class="form-control " value="{{$task->title}}" name="title">
            <button class="btn  text-warning  mx-1 border-warning d-flex ">  <i class="fas fa-edit text-warning m-1"></i> Update</button>
        </div>
       </div>
    </form>

@endsection

