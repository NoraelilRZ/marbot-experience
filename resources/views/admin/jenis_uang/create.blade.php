@extends('admin.template.template')

@section('container')

<div class="d-flex justify-content-between flex-warp flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Jenis Uang Baru</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/admin/jenis-uang" class="mb-3">
        @csrf
        <div class="mb-3">
            <div class="row">
                <div class="col-2"><label class="form-label">Nama Jenis</label></div>
                <div class="col-10">
                    <input id="body" type="text" id="nama_jenis" name="nama_jenis" class="form-control">
                </div>
            </div>
        </div>

        <div class="row text-center px-3"><button type="submit" class="btn btn-primary">Submit</button></div>
    </form>


</div>


@endsection
