@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mt-4">
                            <a href="/home" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-chevron-left"></i> Dashboard</a>
                        </div>
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Crear Empresa</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    {{-- <input type="hidden" name="empresa_id" value="#"> --}}
                                                    <div class="form-group">
                                                        <label for="name" class="">Nombre</label>
                                                        <input type="text" id="name" name="name" class="form-control textbox" value="{{ old('name') }}" autofocus>
                                                        @if($errors->has('name'))
                                                            <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <input type="hidden" name="empresa_id" value="#">
                                                    <div class="form-group">
                                                        <label for="username">Nombre de usuario</label>
                                                        <input type="text" id="username" name="username" class="form-control textbox" value="{{ old('username') }}">
                                                        @if($errors->has('username'))
                                                            <span class="error text-danger" for="input-username">{{ $errors->first('username') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" name="email" class="form-control textbox" value="{{ old('email') }}">
                                                        @if($errors->has('email'))
                                                            <span class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="password">Contraseña</label>
                                                        <input type="password" id="password" name="password" class="form-control textbox" value="{{ old('password') }}">
                                                        @if($errors->has('password'))
                                                            <span class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto bg-transparent">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
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
