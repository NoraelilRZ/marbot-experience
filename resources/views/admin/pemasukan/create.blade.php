<form method="post" action="/admin/pemasukan" class="mb-3">
    @csrf
    <div class="mb-3">
        <div class="row">
            <div class="col-2">
                <label class="form-label">Jenis</label>
            </div>
            <div class="col-10">
                <select class="form-select" name="jenis_uang" id="jenis_uang">
                    <option value="0">-- Pilih Jenis Pemasukan --</option>
                    @foreach($jenis as $ctg)
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
