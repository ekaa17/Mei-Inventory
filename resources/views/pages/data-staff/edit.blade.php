@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Edit Staff</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('data-staff.index') }}">Staff</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <form action="{{ route('data-staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" value="{{ old('nip', $staff->nip) }}">
                                    @error('nip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama', $staff->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email', $staff->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                                        <option value="" disabled>Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('jenis_kelamin', $staff->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin', $staff->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                        <option value="" disabled>Pilih Role</option>
                                        <option value="admin" {{ old('role', $staff->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="guru" {{ old('role', $staff->role) == 'guru' ? 'selected' : '' }}>Guru</option>
                                        <option value="kepala sekolah" {{ old('role', $staff->role) == 'kepala sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="walikelas" class="col-sm-2 col-form-label">Walikelas</label>
                                <div class="col-sm-10">
                                    <select name="walikelas" id="walikelas" class="form-select @error('walikelas') is-invalid @enderror">
                                        <option value="" disabled>Pilih Walikelas</option>
                                        <option value="ya" {{ old('walikelas', $staff->walikelas) == 'ya' ? 'selected' : '' }}>Ya</option>
                                        <option value="tidak" {{ old('walikelas', $staff->walikelas) == 'tidak' ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                    @error('walikelas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="tandatangan" class="col-md-2 col-form-label">Tanda Tangan Digital</label>
                                <div class="col-md-10">
                                    <input type="file" name="tandatangan" id="tandatangan" class="form-control @error('tandatangan') is-invalid @enderror" accept="image/*">
                                    @error('tandatangan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('data-staff.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
