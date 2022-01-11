@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Bienvenido a SmartDoc!</h1>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="container p-4 my-4 border col-12 bg-white">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="container bg-white">

                    <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"  aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"  aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="/storage/pic1.jpeg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Documentos Colaborativos</h5>
                              <p>Comparte estos documentos colaborativamente y facilita la busqueda de los mismos para accelerar la productividad.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="/storage/pic2.jpeg" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Almacenamiento en la nube</h5>
                              <p>Almacena documentos en la nube y accede a ellos desde cualquier parte del mundo.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="/storage/pic3.png" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Organización y acceso rapido</h5>
                              <p>Organiza los documentos y extrae rapidamente con inteligencia artificial.</p>
                            </div>
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>

                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
