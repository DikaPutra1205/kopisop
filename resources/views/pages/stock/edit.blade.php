<!doctype html>
<html lang="en">
@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('update-stocks', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Edit Stok</h3>
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

                                <div class="row mb-3 mt-3">
                                    <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="periode" value="{{ $data->periode }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="pasir_cilegon" class="col-sm-2 col-form-label">Pasir Cilegon</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="pasir_cilegon" value="{{ $data->pasir_cilegon / $konversi->pasir }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="pasir_tayan" class="col-sm-2 col-form-label">Pasir Tayan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="pasir_tayan" value="{{ $data->pasir_tayan / $konversi->pasir }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="split_10_20" class="col-sm-2 col-form-label">Split 10-20</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="split_10_20" value="{{ $data->split_10_20 / $konversi->split }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="split_screening" class="col-sm-2 col-form-label">Split Screening</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="split_screening" value="{{ $data->split_screening / $konversi->screening }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="fly_ash" class="col-sm-2 col-form-label">Fly Ash</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="fly_ash" value="{{ $data->fly_ash / 1000 }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="semen_hc" class="col-sm-2 col-form-label">Semen HC</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="semen_hc" value="{{ $data->semen_hc / 1000 }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="semen_opc" class="col-sm-2 col-form-label">Semen OPC</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="semen_opc" value="{{ $data->semen_opc / 1000 }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="abu_batu" class="col-sm-2 col-form-label">Abu Batu</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="abu_batu" value="{{ $data->abu_batu / 1000 }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="additive_d" class="col-sm-2 col-form-label">Additive D</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="additive_d" value="{{ $data->additive_d }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="additive_f" class="col-sm-2 col-form-label">Additive F</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="additive_f" value="{{ $data->additive_f }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="additive_1g" class="col-sm-2 col-form-label">Additive 1G</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="additive_1g" value="{{ $data->additive_1g }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="additive_2g" class="col-sm-2 col-form-label">Additive 2G</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="additive_2g" value="{{ $data->additive_2g }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="air" class="col-sm-2 col-form-label">Air</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="air" value="{{ $data->air }}">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="solar" class="col-sm-2 col-form-label">Solar</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="solar" value="{{ $data->solar }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-outline-primary">Update</button>
                                        <a href="{{ route('list-stocks') }}" class="btn btn-outline-danger">Kembali</a>
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