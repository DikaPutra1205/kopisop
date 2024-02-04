<!doctype html>
<html lang="en">
@include('layout.head')
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <form method="post" action="{{ route('store-menu') }}" enctype="multipart/form-data">
              @csrf
              <div class="card mt-5">
                <div class="card-header">
                  <h3>Menu Baru</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
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
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" name="nama_menu" value="{{ old('nama_menu') }}" placeholder="Nama Menu">
                      <label for="floatingInput">Nama Menu</label>
                    </div>

                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" name="harga" value="{{ old('harga') }}"  placeholder="Harga">
                      <label for="floatingInput">Harga</label>
                    </div>

                    <div class="mb-3">
                      <label for="formFile" class="form-label">Gambar</label>
                      <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-outline-primary">Buat</button>
                        <a href="{{ route('list-menu') }}" class="btn btn-outline-danger">Kembali</a>
                    </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>