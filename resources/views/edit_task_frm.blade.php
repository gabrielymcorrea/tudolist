@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid"> 
        <div class="row">
            <div class="col">
                <h3>Tudo List</h3>
                <hr>
                <h4 class="text-center mb-5">Edit Task</h4>

                <form action="{{route('edit_task_submit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id_task" value="{{$task->id}}"> 
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <div class="form-group">
                                <label for="text_edit_task">Edit Task:</label>
                                <input type="text" name="text_edit_task" id="text_edit_task" class="form-control" value="{{$task->task }}">
                            </div>

                            <div class="form-group">
                                <a href="{{route('home')}}" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" value="salvar" class="btn btn-primary"> {{--botao salvar --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
               
        </div>
    </div>
@endsection