@include('layout.head');

<body>
    @include('layout.header');
    @include('layout.sidebar');

    <main id="main" class="main">

        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1>Order</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    @if (Auth::user()->id_level == 3)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Add Order
                    </button>
                    @endif
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Table Number</th>
                            <th>Total</th>
                            <th>Employee Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i:s') }}</td>
                            <td>{{ $item->nomor_meja }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->user->nama }}</td>
                            <td>
                                <a href="{{ route('view-order-detail', $item->id) }}" class="btn btn-secondary">
                                    <i class="fa fa-edit"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>


    </main><!-- End #main -->

    <!-- Modal Add Order -->
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Order Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create-order') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Insert Table Number</p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" id="tableNumber" placeholder="Nomor Meja" name="nomor_meja" required>
                            <label for="floatingInput">Table Number</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @include('layout.footer');
</body>