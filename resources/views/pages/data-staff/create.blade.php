@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Tambah Staff</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-staff.index') }}">Staff</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <form action="{{ route('data-staff.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role" id="role" class="form-control" placeholder="Masukkan role" required>
                            </div>

                             <div class="form-group">
                                <label for="password">password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="profile">Profile</label>
                                <input type="file" name="profile" id="profile" class="form-control">
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('data-staff.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection