@include('layout.head');

<body>
    @include('layout.header');
    @include('layout.sidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Pembelian Material</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pembelian Material</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('create-material') }}" class="btn btn-primary">input</a>
                    <a href="{{ route('export-material') }}" class="btn btn-success">Export to Excel</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Tanggal PO</th>
                            <th>Tanggal Kirim</th>
                            <th>Vendor</th>
                            <th>No PO</th>
                            <th>Material</th>
                            <th>QTY</th>
                            <th>Harga Include</th>
                            <th>Total PO Keluar</th>
                            <th>Ket Payment</th>
                            <th>Bayar</th>
                            <th>Tanggal Bayar</th>
                            <th>Kurang Bayar</th>
                            <th>Ket</th>
                            <th>Diinput Oleh</th>
                            <th>Diubah Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->tanggal_po }}</td>
                            <td>{{ $item->tanggal_kirim }}</td>
                            <td>{{ $item->vendor }}</td>
                            <td>{{ $item->no_po }}</td>
                            <td>{{ $item->material }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ 'Rp ' . number_format($item->harga_include, 0, ',', '.') }}</td>
                            <td>{{ 'Rp ' . number_format($item->total_po_keluar, 0, ',', '.') }}</td>
                            <td>{{ $item->ket_payment }}</td>
                            <td>{{ 'Rp ' . number_format($item->bayar, 0, ',', '.') }}</td>
                            <td>{{ $item->tgl_bayar }}</td>
                            <td>{{ 'Rp ' . number_format($item->kurang_bayar, 0, ',', '.') }}</td>
                            <td>{{ $item->ket }}</td>
                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                            <td>{{ $item->updatedBy->nama ?? '-' }}</td>
                            <td>
                                <a href="{{ route('edit-material', $item->id) }}" class="btn btn-warning">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('export-material-single', $item->id) }}" class="btn btn-success">
                                    <i class="fa fa-file-excel"></i> Export
                                </a>
                            </td>
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