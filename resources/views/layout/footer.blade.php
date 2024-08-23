<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Persada Solusi Concrete. 2024</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer><!-- End Footer -->

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Add DataTable initialization script at the bottom of the page -->
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bootstrap5.min.css') }}">
<script src="{{ asset('assets/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap5.min.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $('#nfaTable').DataTable();
        $('#specialTable').DataTable();
    });
</script>

<script>
    function incrementValue(itemId) {
        var input = document.getElementById('itemQuantity_' + itemId);
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        input.value = value;
    }

    function decrementValue(itemId) {
        var input = document.getElementById('itemQuantity_' + itemId);
        var value = parseInt(input.value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 0) {
            value--;
            input.value = value;
        }
    }

    function formatRupiah(input) {
        let value = input.value.replace(/[^,\d]/g, '');
        let numberString = value.replace(/[^,\d]/g, '').toString();
        let split = numberString.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        input.value = 'Rp ' + rupiah;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const faNfaSelect = document.getElementById('faNfa');
        const mutuSelect = document.getElementById('mutuBeton');

        faNfaSelect.addEventListener('change', function() {
            const selectedOption = faNfaSelect.value;

            // Clear existing options in mutu dropdown
            mutuSelect.innerHTML = '<option value="">-- Select An Option --</option>';

            if (selectedOption) {
                // Fetch the mutu options from the server based on selected FA/NFA
                fetch(`/get-mutu-options?fa_nfa=${selectedOption}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.mutu;
                            option.textContent = item.mutu;
                            mutuSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    });
</script>

</body>

</html>