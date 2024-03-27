@extends('layouts.app')


@section('title', 'The List of tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add Task</a>
    </nav>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
    <div class="flex gap-4 justify-between mb-2">
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>

    @empty
        <div>There are no tasks</div>
    @endforelse

    @if ($tasks->count())
    <div>
        <nav class="mt-4">
             {{ $tasks->links() }}
        </nav>

        <form action="{{ route('tasks.destroy-all', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-red-400 hover:bg-red-500">Delete All Task</button>
        </form>
    </div>
    @endif
        {{-- @endif --}}
    @endsection
