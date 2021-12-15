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
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos generales</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Nombre de la empresa:</strong>
            
                            <p class="text-muted">
                                {{ $company->name }}
                            </p>
            
                            <hr>
            
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>
            
                            <p class="text-muted">{{ $company->address }}</p>
            
                            <hr>
            
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
            
                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>
            
                            <hr>
            
                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
            
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection