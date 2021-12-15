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
                        <form method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Editar Empresa</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    {{-- <input type="hidden" name="empresa_id" value="#"> --}}
                                                    <div class="form-group">
                                                        <label for="name" class="">Nombre</label>
                                                        <input type="text" id="name" name="name" class="form-control textbox" value="{{ old('name', $company->name) }}" autofocus>
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
                                                    <div class="form-group">
                                                        <label for="address">Dirección</label>
                                                        <input type="text" id="address" name="address" class="form-control textbox" value="{{ old('address', $company->address) }}">
                                                        @if($errors->has('address'))
                                                            <span class="error text-danger" for="input-address">{{ $errors->first('address') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto bg-transparent">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
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
