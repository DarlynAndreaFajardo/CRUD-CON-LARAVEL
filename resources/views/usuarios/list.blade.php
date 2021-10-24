@extends('layouts.base')

@section('title', 'User List')

@section('contenedor')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Usuarios Registrados</h2>
            <a class="btn btn-success mb-4" href="{{url('/form')}}">Agregar usuario</a>

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
                            <div class="">
                            <a href="{{route('editform', $user->id)}}"  class="btn btn-primary mb-3">
                                <i class=" fas fa-pencil-alt"></i>
                            </a>
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