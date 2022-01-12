@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mt-4">
                            <a href="/home" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-chevron-left"></i> Dashboard</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Listado de Usuarios</h3>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <table id="example1" class="table table-bordered table-striped" data-page-length='5'>
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @forelse ($user->roles as $role)
                                                        <span class="badge badge-pill badge-success permission-badge">{{ $role->name }}</span>
                                                    @empty
                                                        <span class="badge badge-pill badge-danger permission-badge">No tiene rol asignado</span>
                                                    @endforelse
                                                </td>
                                                <td class="text-right">
                                                    @can('user_show')
                                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                                    @endcan
                                                    @can('user_edit')
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                    @endcan
                                                    @can('user_destroy')
                                                        <button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    @endcan
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Solicitud de confirmación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que deseas eliminar este registro?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('users.destroy', 1) }}" data-action="{{ route('users.destroy', 1) }}" style="display: inline-block;" class="form-delete">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-outline-light">Sí, eliminar!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection