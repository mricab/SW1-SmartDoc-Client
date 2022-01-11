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
                <div class="container col-md-12 h-100">
                    <div class="row">
                        <div class="d-flex justify-content-end h-100">
                            <form method="GET" action="{{ route('leng_natural') }}">
                                @csrf
                                <div class="searchbar">
                                    <input name="texto" class="search_input" type="text" placeholder="Search...">
                                    <input name="fold_id" type="hidden" value="{{$ident}}">
                                    <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
                                    <div class="form-check  form-check-inline">
                                        <label class="form-check-label text-light" for="inlineCheckbox1">Buscar</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    

                    <div class="row">
                            <div class="accordion p-1 my-4 col-3" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                      Categorias
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            @foreach ($categories->categories as $cat)
                                                <a href="{{ route('category_doc', ["variable" => $cat->name, "fold_id" => $ident]) }}" class="list-group-item">{{$cat->name}}</a>
                                            @endforeach
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Conceptos
                                    </button>
                                  </h2>
                                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            @foreach ($concepts->concepts as $con)
                                                <a href="{{ route('concept_doc', ["variable" => $con->name, "fold_id" => $ident]) }}" class="list-group-item">{{$con->name}}</a>
                                            @endforeach
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Sentimientos
                                    </button>
                                  </h2>
                                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            @foreach ($sentiments->concepts as $sent)
                                                <a href="{{ route('sentiment_doc', ["variable" => $sent->name, "fold_id" => $ident]) }}" class="list-group-item">{{$sent->name}}</a>
                                            @endforeach
                                        </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        
                        <div class="container p-4 my-4 border col-9 bg-white">
                            <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Nuevo +
                             </button> 
                             
                            <h5>Mis Documento(s)</h5>
                            <hr style="height:2px;border-width:0;color:black;background-color:gray">
                                @if (count(collect($documents)) <= 1)
                                    <div class="row justify-content-center">
                                        <h3 class="text-center">No tiene documentos</h3>
                                    </div>
                                @else
                                    <div class="row row-cols-1 row-cols-md-3 g-4">
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
                                                        <a href="{{ route('destroy_doc', ["doc_id" => $doc->id, "fold_id" => $ident]) }}" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar"><i class="fa fa-trash-alt"></i></a>
                                                        <a href="{{$doc->url}}" class="btn btn-outline-secondary" data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Descargar" target="blank">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                        </div>
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
                                        <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <label class="form-label">Subir Documento<small class="text-muted">(Max: 2 MB)</small></label>
                                            <input name="document" id="document" class="form-control" type="file" required accept="application/*">

                                            <input type="hidden" name="ident" id="ident" value="{{$ident}}">                                            
                                            <br>
                                            <br>
                                            <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Cerrar</button>
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
