@extends('layouts.default')

@section('content')
    <main class="flex-shrink-0 mt-5">
        <div class="container" style="max-width: 800px">

            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif

            <div class="my-5 p-3 bg-body rounded shadow-sm">
                <div>
                    <p>Welcome, {{ auth()->user()->name }}</p>
                </div>
                <h6 class="border-bottom pb-2 mt-3 mb-0">Tasks</h6>

                @forelse ($tasks as $task)
                    <div class="d-flex text-body-secondary pt-3">
                        {{-- Arrow SVG --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-hand-finger-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 8h8.5a1.5 1.5 0 0 1 0 3h-7.5" />
                            <path d="M13.5 11h2a1.5 1.5 0 0 1 0 3h-2.5" />
                            <path d="M14.5 14a1.5 1.5 0 0 1 0 3h-1.5" />
                            <path
                                d="M13.5 17a1.5 1.5 0 1 1 0 3h-4.5a6 6 0 0 1 -6 -6v-2v.208a6 6 0 0 1 2.7 -5.012l.3 -.196q .718 -.468 5.728 -3.286a1.5 1.5 0 0 1 2.022 .536c.44 .734 .325 1.674 -.28 2.28l-1.47 1.47" />
                        </svg>
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">{{ $task->title }} | {{ $task->deadline }}</strong>
                                <div>
                                    <a href="{{ route('task.status.update', $task->id) }}" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-checkbox">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 11l3 3l8 -8" />
                                            <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('task.delete', $task->id) }}" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </a>
                                </div>
                            </div> <span class="d-block">{{ $task->description }}</span>
                        </div>
                    </div>
                @empty
                    <p>No task present.</p>
                @endforelse
                <div class=" mt-3">
                    {{ $tasks->links() }}
                </div>

                {{-- @if ($tasks->isEmpty())
                @else
                    @foreach ($tasks as $task)
                    @endforeach
                @endif --}}

            </div>

        </div>
    </main>
@endsection
