@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active"> {{ $title }} </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('error'))
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
                        <form aaction="{{ route('pelacakan.index') }}" method="GET" id="filterForm">
                            <div class="row text-center mb-3">
                                <div class="col-md-2 my-1">
                                    <a href="{{ route('pelacakan.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Data Baru </a>
                                </div>
                                <div class="col-md-5 my-1">
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" onchange="document.getElementById('filterForm').submit();" value="{{ request('tanggal') }}"> 
                                </div>
                                <div class="col-md-5 my-1">
                                    <select onchange="document.getElementById('filterForm').submit();" name="jenis" id="jenis" class="form-control">
                                        <option value="" selected disabled>Filter Status</option>
                                        <option value="dikirim">Dikirim</option>
                                        <option value="dikemas">Dikemas</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Tanggal </th>
                                        <th> Produk </th>
                                        <th> Qty </th>
                                        <th> Total </th>
                                        <th> Status </th>
                                        <th> Detail Cust </th>
                                        <th> Penanggung Jawab </th>
                                        <th> Progres </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->created_at }}</td>
                                        <td> {{ $item->produk->nama_produk }} </td>
                                        <td>{{ $item->jumlah_barang }} </td>
                                        <td>{{ $item->total }}</td>
                                        <td>
                                            @if($item->status == 'dikemas')
                                                <span class="badge rounded-pill bg-secondary">{{ $item->status }}</span>
                                            @elseif($item->status == 'dikirim')
                                                <span class="badge rounded-pill bg-primary">{{ $item->status }}</span>
                                            @elseif($item->status == 'selesai')
                                                <span class="badge rounded-pill bg-success">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td> 
                                            <button type="button" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#data-cust{{ $item->id }}"><i class="bi bi-person-vcard"></i></button>
                                            <div class="modal fade" id="data-cust{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title">Informasi Customer</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <table>
                                                        <tr>
                                                            <td> Nama </td>
                                                            <td class="w-25"> : </td>
                                                            <td> {{ $item->customer->nama }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Nama </td>
                                                            <td class="w-25"> : </td>
                                                            <td> {{ $item->customer->alamat }} </td>
                                                        </tr>
                                                    </table>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                  </div>
                                                  </div>
                                              </form>
                                              </div>
                                            </div>
                                        </td>
                                        
                                        <td>{{ $item->staff->name }} ( {{ $item->staff->email }} ) </td>
                                        <td>
                                            @if($item->status == 'dikemas')
                                                <a href="/diantar/{{ $item->id }}" class="btn btn-sm btn-outline-secondary">{{ $item->status }}</a>
                                            @elseif($item->status == 'dikirim')
                                                <form action="{{ route('pelacakan.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="d-flex">
                                                        <input type="file" name="bukti" id="bukti" class="form-control @error('bukti') is-invalid @enderror shadow-none" accept="image/*">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="bi bi-check-square"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            @elseif($item->status == 'selesai')
                                                <button type="button" class="btn btn-outline-success shadow-none" data-bs-toggle="modal" data-bs-target="#bukti{{ $item->id }}"><i class="bi bi-check-circle-fill"></i></button>
                                                <div class="modal fade" id="bukti{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                      <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h5 class="modal-title">Bukti Pengiriman</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <img src="{{ asset('assets/img/bukti/'.$item->bukti) }}" alt="{{ $item->bukti }}" class="img-fluid">
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                                                      </div>
                                                      </div>
                                                  </form>
                                                  </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section>
@endsection