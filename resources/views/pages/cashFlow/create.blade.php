<!doctype html>
<html lang="en">
@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('store-cashflows') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Input Cash Flow</h3>
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
                                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Akun</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" f id="inputText" name="akun">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Berita</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" f id="inputText" name="berita">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" f id="inputText" name="keterangan">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="danaMasuk" class="col-sm-2 col-form-label">Dana Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="danaMasuk" oninput="formatRupiah(this)" name="dana_masuk">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="danaKeluar" class="col-sm-2 col-form-label">Dana Keluar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="danaKeluar" oninput="formatRupiah(this)" name="dana_keluar">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-outline-primary">Buat</button>
                                    <a href="{{ route('list-cashflows') }}" class="btn btn-outline-danger">Kembali</a>
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