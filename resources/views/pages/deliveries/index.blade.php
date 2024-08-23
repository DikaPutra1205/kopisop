@include('layout.head');

<body>
    @include('layout.header');
    @include('layout.sidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Deliveries Order</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Deliveries Order</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('deliveries.create') }}" class="btn btn-primary">input</a>
                    <a href="{{ route('export-deliveries') }}" class="btn btn-success">Export to Excel</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Kode Sales</th>
                            <th>Nama Sales</th>
                            <th>Nama Pelanggan</th>
                            <th>Info Kontak Pelanggan</th>
                            <th>Pelanggan Baru/Lama</th>
                            <th>Alamat Kirim</th>
                            <th>Tanggal Kirim</th>
                            <th>Jam Kirim</th>
                            <th>Mutu Beton (Jenis Armada)</th>
                            <th>FA/NFA</th>
                            <th>Slump</th>
                            <th>Harga Include PPN</th>
                            <th>Volume</th>
                            <th>Metode Bongkar</th>
                            <th>Media Cor</th>
                            <th>Cara Bayar</th>
                            <th>Jumlah bayar</th>
                            <th>Jarak Plan - Lokasi Proyek</th>
                            <th>Titipan</th>
                            <th>Diinput Oleh</th>
                            <th>Diubah Oleh</th>
                            <th>Aksi</th>
                            @if (Auth::user()->id_level == 2 || Auth::user()->id_level == 1)
                            <th>Pemakaian Aktual</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->kode_sales }}</td>
                            <td>{{ $item->nama_sales }}</td>
                            <td>{{ $item->nama_pelanggan }}</td>
                            <td>{{ $item->kontak_pelanggan }}</td>
                            <td>{{ $item->pelanggan_baru_lama }}</td>
                            <td>{{ $item->alamat_kirim }}</td>
                            <td>{{ $item->tanggal_kirim }}</td>
                            <td>{{ $item->jam_kirim }}</td>
                            <td>{{ $item->mutu_beton }} ({{ $item->armada }})</td>
                            <td>{{ $item->fa_nfa}}</td>
                            <td>{{ $item->slump }}</td>
                            @if (Auth::user()->id_level == 6)
                            <td>***</td>
                            @else
                            <td>{{ 'Rp ' . number_format($item->harga_ppn, 0, ',', '.') }}</td>
                            @endif
                            <td>{{ $item->volume }}</td>
                            <td>{{ $item->metode_bongkar }}</td>
                            <td>{{ $item->media_cor}}</td>
                            <td>{{ $item->cara_bayar }}</td>
                            <td>{{ 'Rp ' . number_format($item->jumlah_bayar, 0, ',', '.') }}</td>
                            <td>{{ $item->jarak_lokasi }} KM</td>
                            <td>{{ $item->titipan }}</td>
                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                            <td>{{ $item->updatedBy->nama ?? '-' }}</td>
                            <td>
                                <a href="{{ route('deliveries.edit', $item->id) }}" class="btn btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                |
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal{{ $item->id }}">
                                    Delete
                                </button>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="basicModal{{ $item->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Confirmation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this item?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('deliveries.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Hapus -->
                            </td>
                            @if (Auth::user()->id_level == 2 || Auth::user()->id_level == 1)
                            <td>
                                @if (!empty($item->aktual))
                                {{$item->aktual}} |
                                @endif
                                <a href="{{ route('actual', $item->id) }}" class="btn btn-warning">
                                    <i class="fa fa-edit btn-sm"><i class="bi bi-pen"></i></i>
                                </a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>


    </main><!-- End #main -->

    @include('layout.footer');



</body>

</html>