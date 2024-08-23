@include('layout.head');

<body>
    @include('layout.header');
    @include('layout.sidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Konversi</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Konversi</li>
                        </ol>
                    </nav>
                </div>
                <div>
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
                            <th>Pasir</th>
                            <th>Split</th>
                            <th>Screening</th>
                            <th>Diinput Oleh</th>
                            <th>Diedit Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr>
                            <td> 1 </td>
                            <td>{{ $item->pasir }}</td>
                            <td>{{ $item->split }}</td>
                            <td>{{ $item->screening }}</td>
                            <td>{{ $item->createdBy->nama ?? '-' }}</td>
                            <td>{{ $item->updatedBy->nama ?? '-' }}</td>
                            <td>
                                <a href="{{ route('edit-konversi', $item->id) }}" class="btn btn-warning">
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