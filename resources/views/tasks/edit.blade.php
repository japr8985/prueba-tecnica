@extends('layout')

@section('content')

@include('tasks._partial',[
    'action' => route('tasks.update', $task->id),
    'titleForm' => 'Edit Task',
    'editMode' => true,
    'readmode' => false,
    'title' => $task->title,
    'status' => $status,
    'statusValue' => $task->status,
    'description' => $task->description,
    'due_date' => $task->due_date
])
@endsection
