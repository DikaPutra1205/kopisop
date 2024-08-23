<!doctype html>
<html lang="en">
@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('store-jobmix') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Input Jobmix</h3>
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
                                    <label for="mutu" class="col-sm-2 col-form-label">Mutu</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mutu">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="faNfa" class="col-sm-2 col-form-label">FA / NFA / Produk Spesial</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="jenis" id="faNfa" required>
                                            <option selected>-- Select An Option --</option>
                                            <option value="FA">FA</option>
                                            <option value="NFA">NFA</option>
                                            <option value="Special">Produk Spesial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="pasir" class="col-sm-2 col-form-label">Pasir</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="pasir">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="dust" class="col-sm-2 col-form-label">Abu Batu</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="dust">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="split" class="col-sm-2 col-form-label">Split</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="split">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="additive_d" class="col-sm-2 col-form-label">Additive D</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="additive_d">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="additive_f" class="col-sm-2 col-form-label">Additive F</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="additive_f">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="additive_1g" class="col-sm-2 col-form-label">Additive 1G</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="additive_1g">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="additive_2g" class="col-sm-2 col-form-label">Additive 2G</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="additive_2g">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="semen" class="col-sm-2 col-form-label">Semen</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="semen">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="fly_ash" class="col-sm-2 col-form-label">Fly Ash</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="fly_ash">
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="air" class="col-sm-2 col-form-label">Air</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="air">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-outline-primary">Buat</button>
                                    <a href="{{ route('list-jobmix') }}" class="btn btn-outline-danger">Kembali</a>
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