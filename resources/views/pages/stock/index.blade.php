@include('layout.head');

<body>
    @include('layout.header');
    @include('layout.sidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Stok</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Stok</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('create-stocks') }}" class="btn btn-primary">input</a>
                    <a href="{{ route('export-stocks', ['konversi_id' => $konversi->id]) }}" class="btn btn-success">Export to Excel</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Periode</th>
                            <th>Tanggal</th>
                            <th>Pasir Cilegon</th>
                            <th>Pasir Tayan</th>
                            <th>Split 10-20</th>
                            <th>Split Screening</th>
                            <th>Fly Ash</th>
                            <th>Semen HC</th>
                            <th>Semen OPC</th>
                            <th>Abu Batu</th>
                            <th>Additive D</th>
                            <th>Additive F</th>
                            <th>Additive 1G</th>
                            <th>Additive 2G</th>
                            <th>Air</th>
                            <th>Solar</th>
                            <th>Diinput Oleh</th>
                            <th>Diubah Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->periode }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->pasir_cilegon / $konversi->pasir }}</td>
                            <td>{{ $item->pasir_tayan / $konversi->pasir }}</td>
                            <td>{{ $item->split_10_20 / $konversi->split }}</td>
                            <td>{{ $item->split_screening / $konversi->screening}}</td>
                            <td>{{ $item->fly_ash / 1000 }}</td>
                            <td>{{ $item->semen_hc / 1000 }}</td>
                            <td>{{ $item->semen_opc / 1000 }}</td>
                            <td>{{ $item->abu_batu / 1000 }}</td>
                            <td>{{ $item->additive_d }}</td>
                            <td>{{ $item->additive_f }}</td>
                            <td>{{ $item->additive_1g }}</td>
                            <td>{{ $item->additive_2g }}</td>
                            <td>{{ $item->air }}</td>
                            <td>{{ $item->solar }}</td>
                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                            <td>{{ $item->updatedBy->nama ?? '-' }}</td>
                            <td>
                                <a href="{{ route('edit-stocks', $item->id) }}" class="btn btn-warning">
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
                                                <form action="{{ route('delete-stocks', $item->id) }}" method="POST" style="display: inline;">
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Total Stok -->
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="mt-3 text-center"><strong>Total Stok</strong></h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Pasir Cilegon</th>
                                        <th>Pasir Tayan</th>
                                        <th>Split 10-20</th>
                                        <th>Split Screening</th>
                                        <th>Fly Ash</th>
                                        <th>Semen HC</th>
                                        <th>Semen OPC</th>
                                        <th>Abu Batu</th>
                                        <th>Additive D</th>
                                        <th>Additive F</th>
                                        <th>Additive 1G</th>
                                        <th>Additive 2G</th>
                                        <th>Air</th>
                                        <th>Solar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($total as $total)
                                        <td>{{ $total->pasir_cilegon / $konversi->pasir }}</td>
                                        <td>{{ $total->pasir_tayan / $konversi->pasir }}</td>
                                        <td>{{ $total->split_10_20 / $konversi->split }}</td>
                                        <td>{{ $total->split_screening / $konversi->screening }}</td>
                                        <td>{{ $total->fly_ash /1000 }}</td>
                                        <td>{{ $total->semen_hc /1000 }}</td>
                                        <td>{{ $total->semen_opc /1000 }}</td>
                                        <td>{{ $total->abu_batu /1000 }}</td>
                                        <td>{{ $total->additive_d }}</td>
                                        <td>{{ $total->additive_f }}</td>
                                        <td>{{ $total->additive_1g }}</td>
                                        <td>{{ $total->additive_2g }}</td>
                                        <td>{{ $total->air }}</td>
                                        <td>{{ $total->solar }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </section>


    </main><!-- End #main -->

    @include('layout.footer');



</body>

</html>