@extends('layout')

@section('content')

    @include('tasks._partial',[
        'titleForm' => 'Show Task',
        'editMode' => false,
        'readmode' => true,
        'title' => $task->title,
        'status' => $status,
        'statusValue' => $task->status,
        'description' => $task->description,
        'due_date' => $task->due_date
    ])
@endsection
