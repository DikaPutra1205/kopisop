<!doctype html>
<html lang="en">
@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('deliveries.update', $delivery->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Edit Deliveries Order</h3>
                            </div>
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="kodeSales" class="col-form-label">
                                            <strong>Kode Sales (S0x.zz.MM.YY)</strong>
                                        </label>
                                        <input type="text" class="form-control" name="kode_sales" id="kodeSales" value="{{ old('kode_sales', $delivery->kode_sales) }}">
                                    </div>
                                </div>

                                <!-- Nama Sales -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="namaSales" class="col-form-label"><strong>Nama Sales</strong></label>
                                        <select class="form-select" name="nama_sales" id="namaSales">
                                            <option value="Edy Sudrajat" {{ old('nama_sales', $delivery->nama_sales) == 'Edy Sudrajat' ? 'selected' : '' }}>Edy Sudrajat</option>
                                            <option value="Harry Rusli" {{ old('nama_sales', $delivery->nama_sales) == 'Harry Rusli' ? 'selected' : '' }}>Harry Rusli</option>
                                            <option value="Gunadi" {{ old('nama_sales', $delivery->nama_sales) == 'Gunadi' ? 'selected' : '' }}>Gunadi</option>
                                            <option value="Manajemen" {{ old('nama_sales', $delivery->nama_sales) == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
                                            <option value="Dealer" {{ old('nama_sales', $delivery->nama_sales) == 'Dealer' ? 'selected' : '' }}>Dealer</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Nama Pelanggan -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="namaPelanggan" class="col-form-label"><strong>Nama Pelanggan</strong></label>
                                        <input type="text" class="form-control" name="nama_pelanggan" id="namaPelanggan" value="{{ old('nama_pelanggan', $delivery->nama_pelanggan) }}">
                                    </div>
                                </div>

                                <!-- Kontak Pelanggan -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="kontakPelanggan" class="col-form-label"><strong>Kontak Pelanggan</strong></label>
                                        <input type="text" class="form-control" name="kontak_pelanggan" id="kontakPelanggan" value="{{ old('kontak_pelanggan', $delivery->kontak_pelanggan) }}">
                                    </div>
                                </div>

                                <!-- Pelanggan Baru/Lama -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="pelangganBaruLama" class="col-form-label"><strong>Pelanggan Baru/Lama</strong></label>
                                        <select class="form-select" name="pelanggan_baru_lama" id="pelangganBaruLama">
                                            <option value="Pelanggan Baru" {{ old('pelanggan_baru_lama', $delivery->pelanggan_baru_lama) == 'Pelanggan Baru' ? 'selected' : '' }}>Pelanggan Baru</option>
                                            <option value="Pelanggan Lama" {{ old('pelanggan_baru_lama', $delivery->pelanggan_baru_lama) == 'Pelanggan Lama' ? 'selected' : '' }}>Pelanggan Lama</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Alamat Kirim -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="alamatKirim" class="col-form-label"><strong>Alamat Kirim</strong></label>
                                        <input type="text" class="form-control" name="alamat_kirim" id="alamatKirim" value="{{ old('alamat_kirim', $delivery->alamat_kirim) }}">
                                    </div>
                                </div>

                                <!-- Tanggal Kirim -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="tanggalKirim" class="col-form-label"><strong>Tanggal Kirim</strong></label>
                                        <input type="date" class="form-control" name="tanggal_kirim" id="tanggalKirim" value="{{ old('tanggal_kirim', $delivery->tanggal_kirim) }}">
                                    </div>
                                </div>

                                <!-- Jam Kirim -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="jamKirim" class="col-form-label"><strong>Jam Kirim</strong></label>
                                        <input type="time" class="form-control" name="jam_kirim" id="jamKirim" value="{{ old('jam_kirim', $delivery->jam_kirim) }}">
                                    </div>
                                </div>

                                <!-- FA/NFA -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="faNfa" class="col-form-label"><strong>FA / NFA</strong></label>
                                        <select class="form-select" name="fa_nfa" id="faNfa" required>
                                            <option value="FA" {{ old('fa_nfa', $delivery->fa_nfa) == 'FA' ? 'selected' : '' }}>FA</option>
                                            <option value="NFA" {{ old('fa_nfa', $delivery->fa_nfa) == 'NFA' ? 'selected' : '' }}>NFA</option>
                                            <option value="Special" {{ old('fa_nfa', $delivery->fa_nfa) == 'Special' ? 'selected' : '' }}>Special</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Mutu Beton -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="mutuBeton" class="col-form-label"><strong>Mutu Beton</strong></label>
                                        <select class="form-control" name="mutu_beton" id="mutuBeton" required>
                                            <option value="">-- Select An Option --</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Armada -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="armada" class="col-form-label"><strong>Armada</strong></label>
                                        <select class="form-select" name="armada" id="armada" required>
                                            <option value="Mini Mix" {{ old('armada', $delivery->armada) == 'Mini Mix' ? 'selected' : '' }}>TM</option>
                                            <option value="TM" {{ old('armada', $delivery->armada) == 'TM' ? 'selected' : '' }}>TM</option>
                                            <option value="Locco" {{ old('armada', $delivery->armada) == 'Locco' ? 'selected' : '' }}>Locco</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Slump -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="slump" class="col-form-label"><strong>Slump</strong></label>
                                        <select class="form-select" name="slump" id="slump">
                                            <option value="8 +/- 2" {{ old('slump', $delivery->slump) == '8+/-2' ? 'selected' : '' }}>8+/-2</option>
                                            <option value="10 +/- 2" {{ old('slump', $delivery->slump) == '10+/-2' ? 'selected' : '' }}>10+/-2</option>
                                            <option value="12 +/- 2" {{ old('slump', $delivery->slump) == '12+/-2' ? 'selected' : '' }}>12+/-2</option>
                                            <option value="18 +/- 2" {{ old('slump', $delivery->slump) == '18+/-2' ? 'selected' : '' }}>18+/-2</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Harga PPN -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="hargaPpn" class="col-form-label"><strong>Harga PPN</strong></label>
                                        <input type="text" class="form-control" name="harga_ppn" id="hargaPpn" oninput="formatRupiah(this)" value="{{ old('harga_ppn', 'Rp ' . number_format($delivery->harga_ppn, 0, ',', '.')) }}">
                                    </div>
                                </div>

                                <!-- Volume -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="volume" class="col-form-label"><strong>Volume</strong></label>
                                        <input type="number" class="form-control" name="volume" id="volume" value="{{ old('volume', $delivery->volume) }}">
                                    </div>
                                </div>

                                <!-- Metode Bongkar -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="metodeBongkar" class="col-form-label"><strong>Metode Bongkar</strong></label>
                                        <select class="form-select" name="metode_bongkar" id="metodeBongkar">
                                            <option value="Pompa" {{ old('metode_bongkar', $delivery->metode_bongkar) == 'Pompa' ? 'selected' : '' }}>Pompa</option>
                                            <option value="Langsung Tuang" {{ old('metode_bongkar', $delivery->metode_bongkar) == 'Langsung Tuang' ? 'selected' : '' }}>Langsung Tuang</option>
                                            <option value="Langsir/Eceran" {{ old('metode_bongkar', $delivery->metode_bongkar) == 'Langsir/Eceran' ? 'selected' : '' }}>Langsir/Eceran</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Media Cor -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="mediaCor" class="col-form-label"><strong>Media Cor</strong></label>
                                        <select class="form-select" name="media_cor" id="mediaCor">
                                            <option value="Lantai" {{ old('media_cor', $delivery->media_cor) == 'Lantai' ? 'selected' : '' }}>Lantai</option>
                                            <option value="Kolom" {{ old('media_cor', $delivery->media_cor) == 'Kolom' ? 'selected' : '' }}>Kolom</option>
                                            <option value="Canstein" {{ old('media_cor', $delivery->media_cor) == 'Canstein' ? 'selected' : '' }}>Canstein</option>
                                            <option value="Rigid /Jalan" {{ old('media_cor', $delivery->media_cor) == 'Rigid /Jalan' ? 'selected' : '' }}>Rigid /Jalan</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Cara Bayar -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="caraBayar" class="col-form-label"><strong>Cara Bayar</strong></label>
                                        <select class="form-select" name="cara_bayar" id="caraBayar">
                                            <option value="Tunai" {{ old('cara_bayar', $delivery->cara_bayar) == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                                            <option value="Transfer" {{ old('cara_bayar', $delivery->cara_bayar) == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Jumlah Bayar -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="jumlahBayar" class="col-form-label"><strong>Jumlah Bayar</strong></label>
                                        <input type="text" class="form-control" name="jumlah_bayar" id="jumlahBayar" oninput="formatRupiah(this)" value="{{ old('jumlah_bayar', 'Rp ' . number_format($delivery->jumlah_bayar, 0, ',', '.')) }}">
                                    </div>
                                </div>

                                <!-- Jarak Lokasi -->
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="jarakLokasi" class="col-form-label"><strong>Jarak Lokasi</strong></label>
                                        <select class="form-select" name="jarak_lokasi" id="jarakLokasi">
                                            <option value="0-20" {{ old('jarak_lokasi', $delivery->jarak_lokasi) == '0-20' ? 'selected' : '' }}>0-20</option>
                                            <option value="21-25" {{ old('jarak_lokasi', $delivery->jarak_lokasi) == '21-25' ? 'selected' : '' }}>21-25</option>
                                            <option value="26-30" {{ old('jarak_lokasi', $delivery->jarak_lokasi) == '26-30' ? 'selected' : '' }}>26-30</option>
                                            <option value="31-35" {{ old('jarak_lokasi', $delivery->jarak_lokasi) == '31-35' ? 'selected' : '' }}>31-35</option>
                                            <option value="36-40" {{ old('jarak_lokasi', $delivery->jarak_lokasi) == '36-40' ? 'selected' : '' }}>36-40</option>
                                            <option value="41-50" {{ old('jarak_lokasi', $delivery->jarak_lokasi) == '41-50' ? 'selected' : '' }}>41-50</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="titipan" class="col-form-label"><strong>Titipan</strong></label>
                                        <input type="text" class="form-control" name="titipan" id="titipan" value="{{ old('titipan', $delivery->titipan) }}">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-outline-primary">Update</button>
                                        <a href="{{ route('deliveries.index') }}" class="btn btn-outline-danger">Kembali</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>

</html>