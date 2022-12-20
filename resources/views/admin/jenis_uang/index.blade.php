@extends('admin.template.template')

@section('container')

<div class="container">
    <h1 class="text-center">Jenis Uang</h1>
    <br>

    <div class="row mb-3 px-4">
        <a href="/admin/jenis-uang/create" class="btn btn-primary">Create</a>
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
        @endforeach
    </div>
</div>

@endsection
