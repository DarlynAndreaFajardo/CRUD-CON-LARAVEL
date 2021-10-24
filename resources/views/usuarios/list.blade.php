@extends('layouts.base')

@section('title', 'User List')

@section('contenedor')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-1">Usuarios Registrados</h2>
            <a class="btn btn-success mb-1" href="{{url('/form')}}">Agregar usuario</a>

            <table class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->nombre}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->descripcion}}</td>
                        <td>
                            <div class="btn-group">
                            <a href="{{route('editform', $user->id)}}"  class="btn btn-primary mb-1 mr-2">
                                <i class=" fas fa-pencil-alt"></i>
                            </a>

                            <form action="{{route('delete',$user-> id)}}" method="POST">
                                    @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Seguro que desea eliminar');" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            {{ $users->links() }}

        </div>
    </div>
</div>
@endsection