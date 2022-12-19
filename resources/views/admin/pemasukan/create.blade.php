@extends('admin.template.template')

@section('container')

<div class="d-flex justify-content-between flex-warp flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pemasukan Baru</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/pemasukan" class="mb-3">
        @csrf
        <div class="mb-3">
            <div class="row">
                <div class="col-2">
                    <label class="form-label">Jenis</label>
                </div>
                <div class="col-10">
                    <select class="form-select" name="jenis_uang" id="jenis_uang">
                        @foreach($jenis_uang as $ctg)
                            <option value="{{ $ctg->id }}">{{ $ctg->nama_jenis }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-2"><label class="form-label">Jumlah</label></div>
                <div class="col-10">
                    <input id="body" type="number" id="jumlah_pemasukan" name="jumlah_pemasukan" class="form-control">
                </div>
            </div>
        </div>

        <div class="row text-center px-3"><button type="submit" class="btn btn-primary">Submit</button></div>
    </form>


</div>

@endsection
