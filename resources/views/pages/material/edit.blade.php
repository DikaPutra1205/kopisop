<!doctype html>
<html lang="en">
@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('update-material', $material->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Edit Pembelian Material</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div class="alert-title">
                                        <h4>Whoops!</h4>
                                    </div>
                                    There are some problems with your input.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="row mb-3">
                                    <label for="tanggal_po" class="col-sm-2 col-form-label">Tanggal PO</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_po" value="{{ $material->tanggal_po }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal_kirim" class="col-sm-2 col-form-label">Tanggal Kirim</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_kirim" value="{{ $material->tanggal_kirim }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="vendor" class="col-sm-2 col-form-label">Vendor</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="vendor" value="{{ $material->vendor }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="no_po" class="col-sm-2 col-form-label">NO PO</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="no_po" value="{{ $material->no_po }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="material" class="col-sm-2 col-form-label">Material</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="material" value="{{ $material->material }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="qty" class="col-sm-2 col-form-label">QTY</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="qty" value="{{ $material->qty }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="harga_include" class="col-sm-2 col-form-label">Harga Include</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="harga_include" oninput="formatRupiah(this)" name="harga_include" value="Rp {{ number_format($material->harga_include, 0, ',', '.') }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="ket_payment" class="col-sm-2 col-form-label">Ket Payment</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ket_payment" value="{{ $material->ket_payment }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bayar" class="col-sm-2 col-form-label">Bayar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="bayar" oninput="formatRupiah(this)" name="bayar" value="Rp {{ number_format($material->bayar, 0, ',', '.') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal_bayar" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal_bayar" value="{{ $material->tgl_bayar }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="ket" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="ket" value="{{ $material->ket }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                    <a href="{{ route('list-material') }}" class="btn btn-outline-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@include('layout.footer');

</html>
