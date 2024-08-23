@include('layout.head');

<body>
    @include('layout.header');
    @include('layout.sidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Cash FLows</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Cash Flows</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('create-cashflows') }}" class="btn btn-primary">input</a>
                    <a href="{{ route('export-cashflows') }}" class="btn btn-success">Export to Excel</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Tanggal</th>
                            <th>Akun</th>
                            <th>Berita</th>
                            <th>Keterangan</th>
                            <th>Dana Masuk</th>
                            <th>Dana Keluar</th>
                            <th>Saldo</th>
                            <th>Diinput Oleh</th>
                            <th>Diubah Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->akun }}</td>
                            <td>{{ $item->berita }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ 'Rp ' . number_format($item->dana_masuk ?? 0, 0, ',', '.') }}</td>
                            <td>{{ 'Rp ' . number_format($item->dana_keluar ?? 0, 0, ',', '.') }}</td>
                            <td>{{ 'Rp ' . number_format($item->saldo, 0, ',', '.') }}</td>
                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                            <td>{{ $item->updatedBy->nama ?? '-' }}</td>
                            <td>
                                <a href="{{ route('edit-cashflow', $item->id) }}" class="btn btn-warning">
                                    <i class="fa fa-edit"></i> Edit
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