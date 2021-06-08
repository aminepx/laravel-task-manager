@extends('layouts.app1')
@section('content')

@if (session()->has('message'))
<div class="alert alert-success container" role="alert">
    {{session()->get('message')}}
  </div>
   
@endif


<div class="container mt-5" id="parent">
    <div class="row" >
        @foreach ($tasks as $task)
    
<div class="card border-white text-white bg-dark mb-3 m-2" style="max-width: 22rem;">  
            <h5 class="card-header text-white d-flex justify-content-between align-middle">
                 {{$task->title}}
                <a href="{{route('updateFrom',['id'=>$task->id])}}" class="btn text-warning btn-sm border-warning">  <i class="fas fa-edit"></i> </a>
            </h5>
            <div  class="card-body">
              <h5  class="card-title"></h5>

              {{-- subtasks --}}
              @foreach ($task->sub_tasks as $sub)
            
    <div  class=" d-flex justify-content-between">
        <p class="card-text ">
            {{$sub->content}}    
      </p> 
        <div class="here d-flex ">
            <form action="{{route('deleteSubTask',['id'=>$sub->id])}}"  method="post">
                @csrf
                @method('DELETE')
                <button class="btn text-danger btn-sm "><i class="fa fa-trash"></i></button>
                </form>
            {{-- edit --}}
            <div>
                <button class="btn text-warning btn-sm here fa fa-edit mx-1"></button>
            </div>
        {{--  delete and edit buttons --}}
        <form action="{{route('updateSubTask',['id'=>$sub->id])}}" method="post">
            @csrf
            @method('PUT')      
          <button class="btn text-secondary d-none btn-sm fa fa-edit mx-1 "></button>
            <input type="text" class="d-none" style="width: 90px" value="{{$sub->content}}" name="content">
        </form>
        </div>
          {{-- //delete and edit buttons --}}
          {{-- delete --}}
             
    
   

    </div>
    
              @endforeach
              {{-- end subtasks --}}

            </div>
            <form action="{{route('saveSubTask')}}" method="post">
                @csrf
                <div class="form-group bg-transparent">
                    <input type="text" 
                    placeholder="add sub-task"
                    class="form-control "
                    name="content">

                    <input type="hidden" 
                    value="{{$task->id}}"
                    class="form-control "
                    name="task_id"> 
                </div>
                <button class="btn text-primary border-primary form-control mt-2">new Task</button>
            </form>

            <form action="{{route('destroy',['id'=>$task->id])}}" method="post">
              @method('DELETE')
              @csrf
              <div class="form-group">
                  <button class="btn text-danger border-danger form-control mb-3 mt-2">Delete Task</button>
              </div>
              </form>         
        </div>
        
        
        
        
        @endforeach
    </div>
        
    </div>
</div>

<script src="{{asset('js/updatebtn.js')}}">

// document.querySelector('#parent').addEventListener('click',(event)=>{
//   let change= event.target.classList.contains('here');
//   if (change) {
//       event.target.classList.add('d-none');
//       event.target.parentElement.nextElementSibling.classList.toggle('d-none');

//   }
// })

</script>

 

</body>
</html>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    

<script >
  $(document).ready(function(){
    $('.alert-success').fadeOut(3000)
  })
</script>
@endsection

