@extends('admin.template.template')

@section('container')

<div class="container">
    <h1>History Pemasukan</h1>
    <hr>

    <div class="row mb-3 px-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create
        </button>
    </div>
    <div class="row">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Pemasukan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemasukan as $uang)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $jenis->where('id', $uang->jenis_uang)->first()->nama_jenis }}
                        </td>
                        <td>Rp {{ number_format($uang->jumlah_pemasukan,2) }}</td>
                        <td>{{ $uang->created_at }}</td>
                        <td><a class="btn btn-success" href="/admin/pemasukan/{{ $pemasukan[0]->id }}/edit">
                                Edit
                            </a>

                            <form action="/admin/pemasukan/{{ $pemasukan[0]->id }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.pemasukan.create')
                    </div>
                </div>
            </div>
        </div>

        <!-- <div
            class="col-xl-{{ (session()->has('success')) ? '6' : '3' }} col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 position-relative">
                <div class="card-body">
@if(session()->has('success'))
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">Baru</span>
@endif
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                                {{ $jenis->where('id', $pemasukan[0]->jenis_uang)->first()->nama_jenis }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Rp
                                {{ number_format($pemasukan[0]->jumlah_pemasukan,2) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto text-center">
                    <a class="btn btn-success" href="/admin/pemasukan/{{ $pemasukan[0]->id }}/edit">
                        Edit
                    </a>

                    <form action="/admin/pemasukan/{{ $pemasukan[0]->id }}" method="post" class="d-inline">
@method('delete')
@csrf
                        <button class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
@foreach($pemasukan->skip(1) as $entry)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                                    {{ $jenis->where('id', $entry->jenis_uang)->first()->nama_jenis }}
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">Rp
                                    {{ number_format($entry->jumlah_pemasukan,2) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-center">
                        <a class="btn btn-success" href="/admin/pemasukan/{{ $entry->id }}/edit">
                            Edit
                        </a>

                        <form action="/admin/pemasukan/{{ $entry->id }}" method="post" class="d-inline">
@method('delete')
@csrf
                            <button class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
@endforeach
    </div> -->
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @endsection
