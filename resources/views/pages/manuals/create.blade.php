 <!doctype html>
<html lang="en">
@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('store-manuals') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Input Pemakaian Material Manual</h3>
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

                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>

                                <div class="mb-3">
                                    <label for="material" class="form-label">Material</label>
                                    <select class="form-select" id="material" name="material" required>
                                        <option value="">Pilih Material</option>
                                        <option value="Pasir Cilegon">Pasir Cilegon</option>
                                        <option value="Pasir Tayan">Pasir Tayan</option>
                                        <option value="Split 10-20">Split 10-20</option>
                                        <option value="Split Screening">Split Screening</option>
                                        <option value="Fly Ash">Fly Ash</option>
                                        <option value="Semen HC">Semen HC</option>
                                        <option value="Semen OPC">Semen OPC</option>
                                        <option value="Abu Batu">Abu Batu</option>
                                        <option value="Additive D">Additive D</option>
                                        <option value="Additive F">Additive F</option>
                                        <option value="Additive 1G">Additive 1G</option>
                                        <option value="Additive 2G">Additive 2G</option>
                                        <option value="Air">Air</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="qty" class="form-label">QTY</label>
                                    <input type="number" class="form-control" id="qty" name="qty" required>
                                </div>

                                <div class="mb-3">
                                    <label for="ket" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="ket" name="ket" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-outline-primary">Buat</button>
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