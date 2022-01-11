@extends('layouts.app')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-10">
        <h1>Documentos Categoria : <a class="text-primary">{{$var}}</a></h1>
      </div>
    </div>
</section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col align-self-center">
                <div class="container col-md-10 h-100">
                    <div class="container p-4 my-4 border col-12 bg-white"> 
                        <a href="{{ route('folders.show', $ident) }}" class="btn btn-outline-light float-end" style="font-size: 0.5" role="button"><i class="fa fa-arrow-circle-left text-dark fa-2x"></i></a>
                        <h5>Resultados</h5>
                        <hr style="height:2px;border-width:0;color:black;background-color:gray">
                        @if (count(collect($documents)) <= 1)
                            <div class="row justify-content-center">
                                <h3 class="text-center">No existe documentos</h3>
                            </div>
                        @else
                            <div class="row row-cols-1 row-cols-md-4 g-4">
                                @foreach ($documents->documents as $doc)
                                    @if (!empty($doc))
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
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
