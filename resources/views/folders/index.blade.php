@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Carpetas</h1>
      </div>
    </div>
</section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col align-self-center">
                <div class="container col-md-10 h-100">
                    {{--<div class="d-flex justify-content-end h-100">
                        <div class="searchbar">
                            <input class="search_input" type="text" placeholder="Search...">
                            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input" type="checkbox" role="switch" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label text-light" for="inlineCheckbox1">Filtro 1</label>
                            </div>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input" type="checkbox" role="switch" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label text-light" for="inlineCheckbox2">Filtro 2</label>
                            </div>
                            <div class="form-check form-switch form-check-inline">
                                <input class="form-check-input" type="checkbox" role="switch" id="inlineCheckbox3" value="option3">
                                <label class="form-check-label text-light" for="inlineCheckbox3">Filtro 3</label>
                            </div>
                        </div>
                    </div>--}}

                    <div class="container p-4 my-4 border col-12 bg-white">
                        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Nuevo +
                         </button> 
                        <h5>Mis Carpeta(s)</h5>
                        <hr style="height:2px;border-width:0;color:black;background-color:gray">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                          @foreach ($folders as $fol)
                          @if ($loop->first) @continue @endif
                              <div class="col">
                                <div class="card">
                                  <div class="card-header">
                                    <div class="row justify-content-center">
                                      <h5 class="card-title text-center"><i class="fa fa-folder text-info fa-5x"></i></h5>
                                    </div>
                                    <p class="card-text text-center">{{$fol->name}}</p>
                                    
                                    <div class="card-tools">
                                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                      </button>
                                    </div>
                                  </div>
                                  <div class="card-body">
                                    <small class="text-blue fw-light">{{$fol->description}}</small>
                                    <p>
                                      Idioma :
                                      <small class="text-blue fw-light">{{$fol->language}}</small>
                                    </p>
                                  </div>
                                  <div class="card-footer">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                      <a href="{{ route('folders.show', $loop->index) }}" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detalles"><i class="fa fa-eye"></i></a>
                                      <a href="{{ route('folders.destroy', $loop->index) }}" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar"><i class="fa fa-trash-alt"></i></a>
                                      {{--<a href="#" class="btn btn-outline-secondary" data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Descargar"><i class="fa fa-download"></i></a>--}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                          @endforeach
                        </div>
                    </div>
                
                      
                      <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nueva Carpeta</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('folders.store') }}" enctype="multipart/form-data">
                                            @csrf

                                            <label for="exampleFormControlInput1" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre" name="name" required>
                                            <br>
                                            <label for="exampleFormControlInput3" class="form-label">Idioma</label>
                                            <select id="exampleFormControlInput3" class="form-select" aria-label="Default select example" name="language" required>
                                              <option selected>---Seleccione idioma---</option>
                                              <option value="Spanish">Spanish</option>
                                              <option value="English">English</option>
                                              <option value="Portuguese">Portuguese</option>
                                            </select>
                                            <br>
                                            <label for="exampleFormControlInput2" class="form-label">Descripción</label>
                                            <textarea class="form-control" id="exampleFormControlInput2" placeholder="Descripción" name="description" required></textarea>
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary float-end">Guardar</button>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
