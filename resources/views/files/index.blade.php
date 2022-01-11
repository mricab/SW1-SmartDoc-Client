@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Documentos</h1>
      </div>
    </div>
</section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col align-self-center">
                <div class="container col-md-10 h-100">
                    <div class="d-flex justify-content-end h-100">
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
                    </div>

                    <div class="container p-4 my-4 border col-12 bg-white">
                        <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Nuevo +
                         </button> 
                         
                        <h5>Mis Documento(s)</h5>
                        <hr style="height:2px;border-width:0;color:black;background-color:gray">
                        @if (count(array($documents)) > 1)
                            <div class="row row-cols-1 row-cols-md-4 g-4">
                                    @foreach ($documents as $doc)
                                        @if ($loop->first) @continue @endif
                                        <div class="col">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <div class="row justify-content-center">
                                                        @if ($doc->type == 'zip')
                                                            <h5 class="card-title text-center"><i class="fa fa-file-archive text-secondary fa-5x"></i></h5>
                                                        @endif
                                                        @if ($doc->type == 'txt')
                                                            <h5 class="card-title text-center"><i class="fa fa-file-alt text-dark fa-5x"></i></h5>
                                                        @endif
                                                        @if ($doc->type == 'docx' || $doc->type == 'doc')
                                                            <h5 class="card-title text-center"><i class="fa fa-file-word text-primary fa-5x"></i></h5>
                                                        @endif
                                                        @if ($doc->type == 'ppt')
                                                            <h5 class="card-title text-center"><i class="fa fa-file-powerpoint text-warning fa-5x"></i></h5>
                                                        @endif
                                                        @if ($doc->type == 'pdf')
                                                            <h5 class="card-title text-center"><i class="fa fa-file-pdf text-danger fa-5x"></i></h5>
                                                        @endif
                                                        @if ($doc->type == 'xls')
                                                            <h5 class="card-title text-center"><i class="fa fa-file-excel text-success fa-5x"></i></h5>
                                                        @endif
                                                        @if ($doc->type == 'png' || $doc->type == 'jpg' || $doc->type == 'jpeg')
                                                            <h5 class="card-title text-center"><i class="fa fa-file-image text-info fa-5x"></i></h5>
                                                        @endif
                                                    </div>
                                                    <p class="card-text text-center">{{$doc->name}}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                    <a href="{{ route('folders.show', $loop->index-1) }}" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detalles"><i class="fa fa-file-alt"></i></a>
                                                    <a href="{{ route('folders.show', $loop->index-1) }}" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar"><i class="fa fa-trash-alt"></i></a>
                                                    <a href="#" class="btn btn-outline-secondary" data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Descargar"><i class="fa fa-download"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                            @else
                                <div class="row justify-content-center">
                                    <h3 class="text-center">No tiene documentos</h3>
                                </div>
                            @endif
                    </div>
                
                      
                      <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nueva Documento(s)</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('picture.store') }}" enctype="multipart/form-data">--}}
                                            @csrf
                                            <label for="formFileMultiple" class="form-label">Documento(s) <small class="text-muted">Puede seleccionar mas de una</small></label>
                                            <input name=image[] class="form-control" type="file" id="formFileMultiple" multiple required accept="application/*">
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
