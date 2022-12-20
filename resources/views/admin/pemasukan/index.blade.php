@extends('admin.template.template')

@section('container')

<div class="container">
    <h1>History Pemasukan</h1>
    <hr>

    <div class="row mb-3 px-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
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
                        <td><button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#Edit{{ $loop->iteration }}">
                                Edit</button>
                            <form action="/admin/pemasukan/{{ $uang->id }}" method="post"
                                class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <div class="modal fade" id="Edit{{ $loop->iteration }}" tabindex="-1"
                        aria-labelledby="label-create" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="label-edit">Ubah Pemasukan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('admin.pemasukan.edit')
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
        </table>
        <!-- Modal Create -->
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="label-create" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="label-create">Pemasukan Baru</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.pemasukan.create')
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @endsection
