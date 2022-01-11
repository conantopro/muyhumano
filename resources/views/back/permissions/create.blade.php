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
                        <form method="POST" action="{{ route('permissions.store') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Crear Permiso</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="name" class="">Nombre del permiso</label>
                                                        <input type="text" id="name" name="name" class="form-control textbox" value="{{ old('name') }}" autofocus>
                                                        @if($errors->has('name'))
                                                            <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto bg-transparent">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar Permiso</button>
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