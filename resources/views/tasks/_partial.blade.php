<div class="card card-bordered">
    <div class="card-body">
        <form method="POST" action="{{ $action ?? '#' }}" id="task-form" onsubmit="return validateForm()">
            <div class="card-title">
                {{ $titleForm }}
            </div>
            @csrf
            @if ($editMode)
                {{ method_field('PUT') }}
            @endif
            <div class="form-control mb-2">
                <label for="title" class="input input-bordered flex items-center gap-2">
                    <input type="text" class="grow" placeholder="Title" name="title" id="title"
                        value="{{ old('title', $title ?? '') }}" {{ $readmode ? 'readonly' : ''}}>
                </label>
                <span id="titleError" class="text-red-500 text-sm"></span> {{-- Span para errores JS --}}
                @error('title')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-control mb-2">
                <select name="status" id="status" class="select select-primary w-full max-w-ws" {{ $readmode ? 'disabled' : ''}}>
                    <option disabled selected>Select a status</option>
                    @foreach ($status as $s)
                        <option value="{{ $s->value }}"
                            {{ old('status', $statusValue ?? '') == $s->value ? 'selected' : '' }}>
                            {{ Str::headline($s->value) }}</option>
                    @endforeach
                </select>
                <span id="statusError" class="text-red-500 text-sm"></span> {{-- Span para errores JS --}}
                @error('status')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-control mb-2">
                <label for="due_date" class="input input-bordered flex items-center gap-2">
                    <input type="date" name="due_date" id="due_date" placeholder="Due Date"
                        value="{{ old('due_date', $due_date?->format('Y-m-d') ?? '') }}" {{ $readmode ? 'readonly' : ''}}>
                </label>
                <span id="dueDateError" class="text-red-500 text-sm"></span> {{-- Span para errores JS --}}
                @error('due_date')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-control mb-2">
                <textarea name="description" id="description" class="textarea textarea-bordered" placeholder="Description" {{ $readmode ? 'readonly' : ''}}>
                    {{ old('description', $description ?? '') }}
                </textarea>
                <span id="descriptionError" class="text-red-500 text-sm"></span> {{-- Span para errores JS --}}
                @error('description')
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="card-actions justify-end">
                @if (!$readmode)
                    <button type="submit" class="btn btn-primary">
                        {{ $editMode ? 'Update' : 'Create' }}
                    </button>
                @endif
            </div>
        </form>
    </div>
</div>

<script>
    function validateForm() {
        let title = document.getElementById("title").value.trim();
        let status = document.getElementById("status").value;
        let dueDate = document.getElementById("due_date").value;
        let description = document.getElementById("description").value.trim();

        let titleError = document.getElementById("titleError");
        let statusError = document.getElementById("statusError");
        let dueDateError = document.getElementById("dueDateError");
        let descriptionError = document.getElementById("descriptionError");

        // Limpiar mensajes de error
        titleError.textContent = "";
        statusError.textContent = "";
        dueDateError.textContent = "";
        descriptionError.textContent = "";

        let isValid = true;

        if (title === "") {
            titleError.textContent = "El título es obligatorio.";
            isValid = false;
        }

        if (status === "Select a status") { // Comprobar el valor del select
            statusError.textContent = "Debes seleccionar un estado.";
            isValid = false;
        }

        if (dueDate === "") {
            dueDateError.textContent = "La fecha de vencimiento es obligatoria.";
            isValid = false;
        }
        if (description === "") {
            descriptionError.textContent = "La descripción es obligatoria.";
            isValid = false;
        }else if(description.length > 255){
            descriptionError.textContent = "La descripción no puede tener mas de 255 caracteres.";
            isValid = false;
        }

        return isValid;
    }
</script>