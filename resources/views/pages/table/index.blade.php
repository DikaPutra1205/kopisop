@include('layout.head');

<body>
    @include('layout.header');
    @include('layout.sidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Menu</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('create-table') }}" class="btn btn-primary">Add Menu</a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Table Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$item->nomor_meja}}</td>
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