<!doctype html>
<html lang="en">
@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('update-solar', $data->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Edit Pemakaian Solar</h3>
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

                                <div class="row mb-3 mt-3">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <label for="pemakaian" class="col-sm-2 col-form-label">Pemakaian</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="pemakaian" value="{{ $data->pemakaian }}" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-outline-primary">Update</button>
                                        <a href="{{ route('list-solar') }}" class="btn btn-outline-danger">Kembali</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@include('layout.footer')

</html>
