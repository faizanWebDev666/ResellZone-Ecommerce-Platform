<script>
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();

        let url = $(this).data('search-url');
        let query = $('#searchInput').val();

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                search: query
            },
            success: function(response) {
                $('#searchResults').html(response);
            },
            error: function(xhr) {
                console.log('Search failed:', xhr.responseText);
            }
        });
    });
</script>
<script src="{{ URL::asset('backend/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ URL::asset('backend/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('backend/js/feather.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('backend/plugins/slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('backend/js/layout.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('backend/js/theme-settings.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('backend/js/greedynav.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('backend/js/script.js') }}" type="text/javascript"></script>
<script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="e14d810814752db7bc399b44-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"rayId":"91063c643fcce17d","version":"2025.1.0","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}'
    crossorigin="anonymous"></script>
<script>
    window.open("{{ route('admin.dashboard') }}", "_blank");
</script>
</body>
</html>
