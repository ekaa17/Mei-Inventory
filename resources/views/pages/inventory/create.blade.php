@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active"> <a href="{{ url('inventory') }}"> {{ $title }} </a> </li>
                <li class="breadcrumb-item active"> Tambah Data </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <form action="{{ route('inventory.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div>
                                  <label for="produk" class="form-label">Produk</label>
                                  <select name="produk" id="produk" class="form-select @error('produk') is-invalid @enderror">
                                    <option selected disabled>Pilih Informasi Produk</option>
                                    @foreach ($produk as $item)
                                      <option value="{{ $item->id }}" {{ old('produk') == $item->id ? 'selected' : '' }}> {{ $item->nama_produk }} | Stok : {{ $item->stok_produk }} </option>  
                                    @endforeach
                                  </select>
                                  @error('produk') 
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div> 
                                  @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                  <label id="jumlah_barang" class="form-label">Stok</label>
                                  <input type="number" name="jumlah_barang" class="form-control @error('jumlah_barang') is-invalid @enderror shadow-none" id="jumlah_barang" value="{{ old('jumlah_barang') }}">
                                  @error('jumlah_barang') 
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div> 
                                  @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                  <label id="jenis" class="form-label">Jenis Informasi</label>
                                  <select name="jenis" id="jenis" class="form-select @error('jenis') is-invalid @enderror">
                                    <option selected disabled>Pilih Jenis Informasi</option>
                                    <option value="barang masuk" {{ old('jenis') == 'barang masuk' ? 'selected' : '' }} >Barang Masuk</option>
                                    <option value="barang keluar" {{ old('jenis') == 'barang keluar' ? 'selected' : '' }} >Barang Keluar</option>
                                  </select>
                                  @error('jenis') 
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div> 
                                  @enderror
                                </div>
                                <div class="col-md-12 mt-3">
                                  <label id="pesan" class="form-label">Catatan Tambahan</label>
                                  <textarea class="form-control @error('pesan') is-invalid @enderror" name="pesan" id="pesan"> {{ old('pesan') }} </textarea>
                                  @error('pesan') 
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div> 
                                  @enderror
                                </div>           
                              </div>
                              <div class="my-3 d-flex justify-content-between align-items-center">
                                  <a class="btn btn-secondary" href="{{ url('inventory') }}">Kembali</a>
                                  <button type="submit" class="btn btn-primary">Kirim</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </section>
@endsection