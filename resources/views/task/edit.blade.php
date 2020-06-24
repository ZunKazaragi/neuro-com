@extends('extends.dashboard',['_pagename'=>'Task','_backLink'=> route('board.show', [$task->board->group->id,$task->board_id]),'groupId'=>$task->board->group_id])


@section('main-content')

<div class="container d-flex flex-column justify-content-center mb-4">


    <div id="task-container" class="p-4 mb-3 rounded shadow-sm bg-white">
        <div class="container">
            <div class="row no-gutters justify-content-between overflow-hidden mb-3">
            
                <div class="col-8 flex-middle-left py-2">
                <div class="wrappers text-truncate">
                    <p class="h6 m-0" style="color:gray">{{$task->member->user->full_name}}</p>
                    <p class="h5 m-0">{{$task->head}}</p>
                </div>
                </div>

                <div class="col-2 rounded {{$task->progress->status}} flex-center-ultra text-white">
                        <span class="text-capitalize">{{$task->progress->status}}</span></div>
            </div>

            <div class="row mb-2">
                <div class="col-3">
                    <div class="pic-avatar text-center d-flex d-md-block mx-2">
                            <img src="{{ asset($task->member->user->avatar) }}" alt="[avatar]">
                    </div>
                </div>

                <div class="col-9">
                    <form action="{{route('task.update',['group'=>$task->group_id, 'content'=>$task->id])}}" method="POST" class="wrappers" id="editTask">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <p class="h6" style="color:gray">Task Name</p>
                    <input type="datetime" name="task" id="task" class="form-control mb-2" value="{{$task->head}}">
                    <p class="h6" style="color:gray">Detail:</p>
                    <textarea name="description" id="desc" cols="30" rows="5" class="form-control mb-2">{{$task->body}}</textarea>

                    <p class="h6" style="color:gray">Due Date:</p>
                    <input type="date" name="due_date" id="due_date" class="form-control mb-2" value="{{ date("Y-m-d", strtotime($task->progress->due_date))}}">
                    <input type="time" name="due_time" id="due_time" class="form-control mb-2" value="{{ date("H:i", strtotime($task->progress->due_date))}}">
                    <p class="h6" style="color:gray">Status:</p>
                    <div class="form-group">
                    <input type="radio" name="status" id="ongoing" class="mr-2" value="ongoing" checked><label for="ongoing" class=""> On-Going</label>
                    <input type="radio" name="status" id="finish" class="mx-2" value="finish"><label for="finish" class=""> Finish</label>
                    </div>
                    </form>
                </div>
            </div>
            @if (Auth::user()->id == $task->member->user->id)
                
            <div class=" text-right">
                <button type="submit" form="editTask" class="btn btn-primary">Update Task</button>
                </div>
            </div>

            @endif
    </div>
</div>

@endsection