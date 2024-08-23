<!doctype html>
<html lang="en">
@include('layout.head')

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <form method="post" action="{{ route('deliveries.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3>Input Deliveries Order</h3>
                            </div>
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="kodeSales" class="col-form-label">
                                            <strong>Kode Sales (S0x.zz.MM.YY)</strong>
                                            <br>
                                            S01 : Kode Sales
                                            <br>
                                            zz : No. pesanan
                                            <br>
                                            MM : Bulan berjalan
                                            <br>
                                            YY : Tahun berjalan
                                            <br>
                                            Note : tambahkan "T" diakhir kode jika ada titipan mandor atau pihak lain (Contoh : S01.01.07.24-T)</label>
                                        <input type="text" class="form-control" name="kode_sales" id="kodeSales" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="namaSales" class="col-sm-2 col-form-label"><strong>Nama Sales</strong></label>
                                        <select class="form-select" name="nama_sales" id="namaSales" required>
                                            <option>-- Select An Option --</option>
                                            <option value="Edy Sudrajat">Edy Sudrajat</option>
                                            <option value="Harry Rusli">Harry Rusli</option>
                                            <option value="Gunadi">Gunadi</option>
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Dealer">Dealer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="namaPelanggan" class="col-sm-2 col-form-label"><strong>Nama Pelanggan</strong></label>
                                        <input type="text" class="form-control" name="nama_pelanggan" id="namaPelanggan" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="kontakPelanggan" class="col-sm-2 col-form-label"><strong>Kontak Pelanggan</strong></label>
                                        <input type="text" class="form-control" name="kontak_pelanggan" id="kontakPelanggan" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="pelangganBaruLama" class="col-sm-8 col-form-label"><strong>Apakah pelanggan anda termasuk pelanggan baru atau pernah membeli sebelumnya?</strong></label>
                                        <select class="form-select" name="pelanggan_baru_lama" id="pelangganBaruLama" required>
                                            <option>-- Select An Option --</option>
                                            <option value="Pelanggan Baru">Pelanggan Baru</option>
                                            <option value="Pelanggan Lama">Pelanggan Lama</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="alamatKirim" class="col-sm-2 col-form-label"><strong>Alamat Kirim</strong></label>
                                        <input type="text" class="form-control" name="alamat_kirim" id="alamatKirim" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="tanggalKirim" class="col-sm-2 col-form-label"><strong>Tanggal Kirim</strong></label>
                                        <input type="date" class="form-control" name="tanggal_kirim" id="tanggalKirim" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="jamKirim" class="col-sm-2 col-form-label"><strong>Jam Kirim</strong></label>
                                        <input type="time" class="form-control" name="jam_kirim" id="jamKirim" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="faNfa" class="col-sm-8 col-form-label"><strong>FA / NFA</strong></label>
                                        <select class="form-select" name="fa_nfa" id="faNfa" required>
                                            <option value="" selected>-- Select An Option --</option>
                                            <option value="FA">FA</option>
                                            <option value="NFA">NFA</option>
                                            <option value="Special">Special</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="mutuBeton" class="col-sm-2 col-form-label"><strong>Mutu Beton</strong></label>
                                        <select class="form-control" name="mutu_beton" id="mutuBeton" required>
                                            <option value="">-- Select An Option --</option>
                                            <!-- Options will be populated based on FA/NFA selection -->
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="armada" class="col-sm-2 col-form-label"><strong>Armada</strong></label>
                                        <select class="form-select" name="armada" id="armada" required>
                                            <option selected>-- Select An Option --</option>
                                            <option value="Mini Mix">Mini Mix</option>
                                            <option value="TM">TM</option>
                                            <option value="Locco">Locco</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="slump" class="col-sm-8 col-form-label">
                                            <strong>Slump</strong>
                                        </label>
                                        <select class="form-select" name="slump" id="slump" required>
                                            <option selected>-- Select An Option --</option>
                                            <option value="8 +/- 2">8 +/- 2</option>
                                            <option value="10 +/- 2">10 +/- 2</option>
                                            <option value="12 +/- 2">12 +/- 2</option>
                                            <option value="18 +/- 2">18 +/- 2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-10">
                                        <label for="harga_ppn" class="col-sm-2 col-form-label"><strong>Harga Incl PPn</strong></label>
                                        <input type="text" class="form-control" id="hargaPPn" oninput="formatRupiah(this)" name="harga_ppn">
                                    </div>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-10">
                                        <label for="volume" class="col-sm-2 col-form-label"><strong>Volume</strong></label>
                                        <input type="number" class="form-control" name="volume">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="metodeBongkar" class="col-sm-8 col-form-label"><strong>Metode Bongkar</strong></label>
                                        <select class="form-select" name="metode_bongkar" id="metodeBongkar" required>
                                            <option>-- Select An Option --</option>
                                            <option value="Pompa">Pompa</option>
                                            <option value="Langsung Tuang">Langsung Tuang</option>
                                            <option value="Langsir/Eceran">Langsir/Eceran</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="mediaCor" class="col-sm-8 col-form-label"><strong>Media Cor</strong></label>
                                        <select class="form-select" name="media_cor" id="mediaCor" required>
                                            <option>-- Select An Option --</option>
                                            <option value="Lantai">Lantai</option>
                                            <option value="Kolom">Kolom</option>
                                            <option value="Canstein">Canstein</option>
                                            <option value="Rigid/Jalan">Rigid/Jalan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="caraBayar" class="col-sm-8 col-form-label"><strong>Cara Bayar</strong></label>
                                        <select class="form-select" name="cara_bayar" id="caraBayar" required>
                                            <option selected>-- Select An Option --</option>
                                            <option value="Tunai">Tunai</option>
                                            <option value="Transfer">Transfer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <div class="col-sm-10">
                                        <label for="jumlah_bayar" class="col-sm-2 col-form-label"><strong>Jumlah Bayar</strong></label>
                                        <input type="text" class="form-control" id="jumlahBayar" oninput="formatRupiah(this)" name="jumlah_bayar">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="jarakLokasi" class="col-sm-8 col-form-label"><strong>Jarak Plan - Lokasi Proyek</strong></label>
                                        <select class="form-select" name="jarak_lokasi" id="jarakLokasi" required>
                                            <option>-- Select An Option --</option>
                                            <option value="0-20">0-20 km</option>
                                            <option value="21-25">21-25 km</option>
                                            <option value="26-30">26-30 km</option>
                                            <option value="31-35">31-35 km</option>
                                            <option value="36-40">36-40 km</option>
                                            <option value="41-50">41-50 km</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <label for="titipan" class="col-sm-2 col-form-label"><strong>Titipan</strong></label>
                                        <input type="text" class="form-control" name="titipan" id="titipan" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-outline-primary">Create</button>
                                        <a href="{{ route('deliveries.index') }}" class="btn btn-outline-danger">Back</a>
                                    </div>
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