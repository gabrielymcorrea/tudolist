@extends('layouts.main_layout')

@section('content')
    <div class="container-fluid"> 
        <div class="row">
            <div class="col">
                <h3>Tudo List</h3>
                <hr>
                <div class="my-2">
                    <a href="{{route('new_task')}}" class="btn btn-primary">Criar Task </a>
                    <a href="{{route('list_invisibles')}}" class="btn btn-primary">Listar invisible tasks </a>
                </div>
                <hr>

                @if ($tasks->count() === 0)
                    <p>Não existe tarefas a realizar </p>    
                @else
                    <table class="table table-striped"> 
                        <thead class="thead-dark">
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td style="width: 70%"> {{$task->task}}</td> 
                                    <td>
                                        {{--done e not done --}}
                                        @if ($task->done == null)
                                            <a href="{{ route('task_done', ['id' => $task->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></a>
                                        @else
                                            <a href="{{ route('task_undone', ['id' => $task->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-times"></i></a>
                                        @endif

                                        {{-- editar --}}
                                        <a href="{{ route('edit_task', ['id' => $task->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>

                                        {{--visivel e nao visivel --}}
                                        @if ($task->visible === 1)
                                            <a href="{{route('task_invisible', ['id'=>$task->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye-slash"></i></a>
                                        @else
                                            <a href="{{route('task_visible', ['id'=>$task->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                         @endif
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <p>Total: <strong>{{$tasks->count()}} </strong></p>         
                @endif
            </div>
        </div>
    </div>
@endsection