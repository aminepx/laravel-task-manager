@extends('layouts.app1')

@section('content')
    <form action="{{route('added')}}" method="post">   
        @csrf
       <div class="form-group col-md-4 mt-5 offset-4">
           <h1 class="text-secondary mb-4">Add new task</h1>
           <div class="d-flex">
            <input type="text" class="form-control " placeholder="Add a new task" name="title">
            <button class="btn  text-info  mx-1 border-info d-flex ">  <i class="fas fa-plus-circle text-info m-1"></i> Add</button>
           </div>
           
       </div>
    </form>
@endsection