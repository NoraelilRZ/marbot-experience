@extends('admin.template.template')

@section('container')

<div class="container">
    <h1>History Pemasukan</h1>
    <hr>

    <div class="row mb-3 px-4">
        <a href="/admin/pemasukan/create" class="btn btn-primary">Create</a>
    </div>
    <div class="row">
        <div
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
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection
