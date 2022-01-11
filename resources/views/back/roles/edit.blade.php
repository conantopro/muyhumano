@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group mt-4">
                            <a href="/home" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-chevron-left"></i> Dashboard</a>
                        </div>
                        <form method="POST" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Editar Rol</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    {{-- <input type="hidden" name="empresa_id" value="#"> --}}
                                                    <div class="form-group">
                                                        <label for="name" class="">Nombre del rol</label>
                                                        <input type="text" id="name" name="name" class="form-control textbox" value="{{ old('name', $role->name) }}" autofocus>
                                                        @if($errors->has('name'))
                                                            <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                        @endif{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach ($permissions as $id => $permission)
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"  id="permission-{{ $id }}" name="permissions[]" value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                                                        <label for="permission-{{ $id }}" class="custom-control-label">{{ $permission }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto bg-transparent">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Actualizar Rol</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection