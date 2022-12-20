<form method="post" action="/admin/jenis-uang" class="mb-3">
    @csrf
    <div class="mb-3">
        <div class="row">
            <div class="col-4"><label class="form-label">Nama Jenis</label></div>
            <div class="col-8">
                <input value="{{ $entry->nama_jenis }}" id="body" type="text" id="nama_jenis" name="nama_jenis"
                    class="form-control">
            </div>
        </div>
    </div>

    <div class="row text-center px-3"><button type="submit" class="btn btn-primary">Submit</button></div>
</form>
