@extends('layout.head')

<body>
    @include('layout.header')
    @include('layout.sidebar')

    <div class="content">
        <div class="container-fluid">

            <main id="main" class="main">

                <div class="pagetitle">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1>User</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">User</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div><!-- End Page Title -->

                <!-- Order Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h1 class="h3 mb-3 text-gray-800 mt-2">Order Detail</h1>
                        <p class="mb-1"><strong>Order ID:</strong> {{ $order->id }}</p>
                        <p class="mb-1"><strong>Employee Name:</strong> {{ $order->user->nama }}</p>
                        <p class="mb-1"><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</p>
                        <p class="mb-5"><strong>Table Number:</strong> {{ $order->table->nomor_meja }}</p>

                        <!-- Order Items -->
                        <h3 class="mb-2">Order Details</h3>
                        <ul class="list-group">
                            @foreach($order->menus as $menu)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $menu->nama_menu }}
                                <span class="badge bg-primary rounded-pill ms-auto">Qty: {{ $menu->pivot->qty }}</span>
                                <span class="badge bg-success rounded-pill ms-2">Total: Rp {{ number_format($menu->harga * $menu->pivot->qty, 0, ',', '.') }}</span>
                            </li>
                            @endforeach
                        </ul>

                        <!-- Order Total -->
                        <h3 class="mt-4 mb-2">Total: Rp {{ number_format($order->total, 0, ',', '.') }}</h3>
                    </div>
                </div>

            </main>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>
