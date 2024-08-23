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
                    <a href="{{ route('create-jobmix') }}" class="btn btn-primary">input</a>
                    <a href="{{ route('export-cashflows') }}" class="btn btn-success">Export to Excel</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#FA">FA</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#NFA">NFA</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Special">Produk Spesial</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active FA" id="FA">
                            <div class="row">
                                <table id="myTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Mutu</th>
                                            <th>Pasir</th>
                                            <th>Abu Batu</th>
                                            <th>Split</th>
                                            <th>Additive D</th>
                                            <th>Additive F</th>
                                            <th>Additive 1G</th>
                                            <th>Additive 2G</th>
                                            <th>Semen</th>
                                            <th>Fly Ash</th>
                                            <th>Diinput Oleh</th>
                                            <th>Diubah Oleh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fa as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->mutu }}</td>
                                            <td>{{ $item->pasir }}</td>
                                            <td>{{ $item->dust }}</td>
                                            <td>{{ $item->split }}</td>
                                            <td>{{ $item->additive_d }}</td>
                                            <td>{{ $item->additive_f }}</td>
                                            <td>{{ $item->additive_1g }}</td>
                                            <td>{{ $item->additive_2g }}</td>
                                            <td>{{ $item->semen }}</td>
                                            <td>{{ $item->fly_ash }}</td>
                                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                                            <td>{{ $item->updatedBy->nama ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('edit-jobmix-fa', $item->id) }}" class="btn btn-warning">
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
                                                                <form action="{{ route('delete-jobmix-fa', $item->id) }}" method="POST" style="display: inline;">
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
                            </div>
                        </div>

                        <div class="tab-pane fade NFA" id="NFA">
                            <div class="row">
                                <table id="nfaTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Mutu</th>
                                            <th>Pasir</th>
                                            <th>Abu Batu</th>
                                            <th>Split</th>
                                            <th>Additive D</th>
                                            <th>Additive F</th>
                                            <th>Additive 1G</th>
                                            <th>Additive 2G</th>
                                            <th>Semen</th>
                                            <th>Diinput Oleh</th>
                                            <th>Diubah Oleh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nfa as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->mutu }}</td>
                                            <td>{{ $item->pasir }}</td>
                                            <td>{{ $item->dust }}</td>
                                            <td>{{ $item->split }}</td>
                                            <td>{{ $item->additive_d }}</td>
                                            <td>{{ $item->additive_f }}</td>
                                            <td>{{ $item->additive_1g }}</td>
                                            <td>{{ $item->additive_2g }}</td>
                                            <td>{{ $item->semen }}</td>
                                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('edit-jobmix-nfa', $item->id) }}" class="btn btn-warning">
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
                                                                <form action="{{ route('delete-jobmix-nfa', $item->id) }}" method="POST" style="display: inline;">
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
                            </div>
                        </div>

                        <div class="tab-pane fade" id="Special">
                            <div class="row">
                                <table id="specialTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Mutu</th>
                                            <th>Pasir</th>
                                            <th>Abu Batu</th>
                                            <th>Split</th>
                                            <th>Additive D</th>
                                            <th>Additive F</th>
                                            <th>Additive 1G</th>
                                            <th>Additive 2G</th>
                                            <th>Semen</th>
                                            <th>fly_ash</th>
                                            <th>Diinput Oleh</th>
                                            <th>Diubah Oleh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($special as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->mutu }}</td>
                                            <td>{{ $item->pasir }}</td>
                                            <td>{{ $item->dust }}</td>
                                            <td>{{ $item->split }}</td>
                                            <td>{{ $item->additive_d }}</td>
                                            <td>{{ $item->additive_f }}</td>
                                            <td>{{ $item->additive_1g }}</td>
                                            <td>{{ $item->additive_2g }}</td>
                                            <td>{{ $item->semen }}</td>
                                            <td>{{ $item->fly_ash }}</td>
                                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('edit-jobmix-special', $item->id) }}" class="btn btn-warning">
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
                                                                <form action="{{ route('delete-jobmix-special', $item->id) }}" method="POST" style="display: inline;">
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
                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>

        </section>


    </main><!-- End #main -->

    @include('layout.footer');



</body>

</html>