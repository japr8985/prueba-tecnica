@extends('layout')

@section('content')
<div class="card card-bordered">
    
    <div class="card-body overflow-x-auto">
        <div class="card-title flex justify-between">
            <span class="font-bold">Tasks</span>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <span class="i-mdi-plus"></span>
                Create new Task
            </a>
        </div>
        <table class="table table-zebra">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date->format('d/m/Y') }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">
                                <span class="i-mdi-magnify"></span>
                            </a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">
                                <span class="i-mdi-pencil"></span>
                            </a>
                            <button class="btn btn-sm btn-error" onclick="deleteTask({{ $task }})">
                                <span class="i-mdi-trash"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-actions">
        <div class="flex justify-between w-full px-4 py-2">
            {{ $tasks->links() }}
        </div>
    </div>
</div>


<dialog id="deleteModal" class="modal">
  <div class="modal-box">
    <h3 class="text-lg font-bold">Warning</h3>
    <p class="py-4">
        Are you sure you want to delete task <span id='task-to-delete' class="text-bold text-red"></span>?
    </p>
    <div class="modal-action">
      <form method="post" id="delete-form">
        @method('delete')
        @csrf
        <button type="button" class="btn btn-outline" onclick="closeModal()">Cancelar</button>
        <button class="btn btn-error">Delete</button>
      </form>
    </div>
  </div>
</dialog>
{{--  --}}
@if (session('type'))
<div class="toast" id="toast-message">
    <div class="alert {{ session('type')}} font-bold">
        {{ session('message') }}
    </div>
</div>
@endif

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('toast-message');

        if (toast) { // Verifica si el elemento existe
            toast.style.display = 'block'; // Muestra el toast

            setTimeout(function() {
                toast.style.display = 'none'; // Oculta el toast después de 3 segundos
            }, 3000); // 3000 milisegundos = 3 segundos
        }
    })
    const deleteForm = document.getElementById('delete-form');

    const deleteTask = (task) => {
        const modal = document.getElementById('deleteModal');
        const taskToDelete = document.getElementById('task-to-delete');
        
        deleteForm.action = `/tasks/${task.id}`
        taskToDelete.innerHTML = task.title
        modal.showModal()
    }
    const closeModal = () => {
        deleteModal.close();
    };
</script>
@endsection