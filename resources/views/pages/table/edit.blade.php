<!DOCTYPE html>
<html lang="en">
@include('layout.head')
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <form method="post" action="{{ route('update-table', $table->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card mt-5">
                <div class="card-header">
                  <h3>Table Update</h3>
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

                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" name="nomor_meja" value="{{ old('nomor_meja', $table->nomor_meja) }}" placeholder="Table Number">
                      <label for="floatingInput">Table Number</label>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-outline-primary">Update</button>
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
  @include('layout.footer');
</html>