@extends('layout')

@section('content')
    @include('tasks._partial',[
        'titleForm' => 'Create a new Task',
        'action' => route('tasks.store'),
        'editMode' => false,
        'readmode' => false,
    ])
@endsection
