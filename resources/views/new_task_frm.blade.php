@extends('layouts.main_layout')

@section('content')
    <div class="container-fluid"> 
        <div class="row">
            <div class="col">
                <h3>Tudo List</h3>
                <hr>
                <h4 class="text-center mb-5">New Task</h4>

                <form action="{{route('new_task_submit')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <div class="form-group">
                                <label for="text_new_task">New Task:</label>
                                <input type="text" name="text_new_task" id="text_new_task" class="form-control">
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