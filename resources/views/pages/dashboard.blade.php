@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <!-- Card -->
                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body row justify-content-center text-center m-2">
                                <img src="{{ asset('assets/img/logo.jpg') }}" alt="" class="img-fluid w-50 mt-3">
                                <h6> SELAMAT DATANG <br> DI <br> SISTEM INFORMASI INVENTORY </h6>
                            </div>
                        </div>

                    </div><!-- End Card -->
                </div>
            </div>
        </div>
        <div class="row">
    
            <!-- GuruCard -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total Guru</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6> </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End GuruCard -->

            <!-- Siswa Card -->
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title"> Total Siswa </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6> </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Siswa Card -->

            <!-- Mapel Card -->
            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title"> Total Mapel </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6> </h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Mapel Card -->
            
            <!-- Jurusan Card -->
            <div class="col-xxl-3 col-md-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title"> Total Jurusan </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-bookmark"></i>
                    </div>
                    <div class="ps-3">
                      <h6> </h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Jurusan Card -->

          </div>
    </section>
@endsection