@include('layout.head');

<body>

        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Form Edit FA</h3>

                    <!-- Form Edit -->
                    <form action="{{ route('update-jobmix-fa', $fa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="mutu" class="col-sm-2 col-form-label">Mutu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="mutu" id="mutu" value="{{ $fa->mutu }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pasir" class="col-sm-2 col-form-label">Pasir</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="pasir" id="pasir" value="{{ $fa->pasir }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dust" class="col-sm-2 col-form-label">Abu Batu</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="dust" id="dust" value="{{ $fa->dust }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="split" class="col-sm-2 col-form-label">Split</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="split" id="split" value="{{ $fa->split }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="additive_d" class="col-sm-2 col-form-label">Additive D</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="additive_d" id="additive_d" value="{{ $fa->additive_d }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="additive_f" class="col-sm-2 col-form-label">Additive F</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="additive_f" id="additive_f" value="{{ $fa->additive_f }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="additive_1g" class="col-sm-2 col-form-label">Additive 1G</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="additive_1g" id="additive_1g" value="{{ $fa->additive_1g }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="additive_2g" class="col-sm-2 col-form-label">Additive 2G</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="additive_2g" id="additive_2g" value="{{ $fa->additive_2g }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="semen" class="col-sm-2 col-form-label">Semen</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="semen" id="semen" value="{{ $fa->semen }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="air" class="col-sm-2 col-form-label">Fly Ash</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="fly_ash" id="fly_ash" value="{{ $fa->fly_ash }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="air" class="col-sm-2 col-form-label">Air</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="air" id="air" value="{{ $fa->air }}" step="any">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('list-jobmix') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form><!-- End Form Edit -->

                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('layout.footer');

</body>

</html>