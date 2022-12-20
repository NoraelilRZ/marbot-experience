@extends('admin.template.template')

@section('container')

<div class="container">
    <h1 class="text-center">Jenis Uang</h1>
    <br>

    <div class="row mb-3 px-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
            Create
        </button>
    </div>
    <div class="row">
        @foreach($jenis_uang as $entry)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                                    {{ $entry->nama_jenis }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto text-center">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#Edit{{ $loop->iteration }}">
                            Edit</button>
                        <form action="/admin/jenis-uang/{{ $entry->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="Edit{{ $loop->iteration }}" tabindex="-1" aria-labelledby="label-create"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="label-edit">Ubah Pemasukan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @include('admin.jenis_uang.edit')
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="label-create" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="label-create">Pemasukan Baru</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.jenis_uang.create')
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
