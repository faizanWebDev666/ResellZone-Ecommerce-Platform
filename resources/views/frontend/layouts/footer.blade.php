@if (!in_array(request()->path(), ['dashboard', 'profile', 'questions', 'sellerUpdatePassword']))
<footer style="background-color: white; color: #ffffff; padding: 60px 20px; font-family: 'Segoe UI', sans-serif;">
    <div class="container" style="max-width: 1300px; margin: auto;">
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px;">

            <!-- Quick Links -->
            <div style="flex: 1 1 220px;">
                <h5 style="margin-bottom: 15px; font-size: 18px;">Quick Links</h5>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="{{ route('faq') }}" target="_blank" style="color: #C40032; text-decoration: none;">FAQ</a></li>
                    <li><a href="{{ route('privacypolicy') }}" target="_blank" style="color: #C40032; text-decoration: none;">Privacy Policy</a></li>
                    <li><a href="{{ route('blog.index') }}" target="_blank" style="color: #C40032; text-decoration: none;">Blog Details</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div style="flex: 1 1 220px;">
                <h5 style="margin-bottom: 15px; font-size: 18px;">Services</h5>
                <ul style="list-style: none; padding: 0; color: #C40032;">
                    <li>Product Sourcing</li>
                    <li>Marketing Support</li>
                    <li>Business Consulting</li>
                </ul>
            </div>

            <!-- Contact -->
            <div style="flex: 1 1 220px;">
                <h5 style="margin-bottom: 15px; font-size: 18px;">Contact</h5>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="{{ route('home') }}" style="color: #C40032; text-decoration: none;">Home</a></li>
                    <li><a href="{{ route('about') }}" target="_blank" style="color: #C40032; text-decoration: none;">About</a></li>
                    <li><a href="{{ route('contact') }}" target="_blank" style="color: #C40032; text-decoration: none;">Contact</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div style="flex: 1 1 260px;">
                <h5 style="margin-bottom: 15px; font-size: 18px;">Newsletter</h5>
                <form action="{{ URL::to('newsLetter') }}" method="POST">
                    @csrf
                    <div style="display: flex; background-color: white; border: 1px solid #444; border-radius: 6px; overflow: hidden;">
                        <input type="email" name="email" placeholder="Enter email" required
                            style="flex: 1; padding: 10px 12px; border: none; background-color: transparent; color: #fff; font-size: 14px;">
                        <button type="submit"
                            style="background-color: #C40032; color: white; padding: 10px 20px; border: none; font-weight: 600; font-size: 14px; cursor: pointer;">
                            Subscribe
                        </button>
                    </div>
                </form>
                <div style="margin-top: 15px; color: #C40032; font-size: 14px;">
                    <p>📞 +92 334 0667381</p>
                    <p>📞 +92 349 1321662</p>
                    <p>✉ services@resellzone.com</p>
                </div>
            </div>
        </div>

        <hr style="border-color: #444; margin: 40px 0;">

        <!-- Footer Bottom -->
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 20px;">
            <div style="flex: 1;">
                <img src="{{ asset('frontend/img/logo_home.png') }}" alt="ResellZone Logo" style="height: 60px; " width="100px; ">
            </div>
            <div style="flex: 2; text-align: right; color: #aaa; font-size: 14px;">
                © 2025 ResellZone. All rights reserved.
            </div>
        </div>
    </div>





<script>
   function adjustAlignment() {
       if (window.innerWidth <= 768) {
           document.getElementById('logoContainer').style.justifyContent = 'center';
           document.getElementById('footerText').style.textAlign = 'center';
       } else {
           document.getElementById('logoContainer').style.justifyContent = 'flex-start';
           document.getElementById('footerText').style.textAlign = 'left';
       }
   }

   // Adjust alignment on page load and when window resizes
   window.onload = adjustAlignment;
   window.onresize = adjustAlignment;
</script>


    <div class="progress-wrap active-progress" onclick="scrollToTop()">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path id="progress-path" d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 307.919px; stroke: hsl(0, 72%, 39%); stroke-width: 4; fill: none; stroke-linecap: round;">
            </path>
        </svg>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let div = document.getElementById("dynamicDiv");
        div.style.width = "auto";
        div.style.backgroundColor = "#0a0f28";
        div.style.color = "white";
        div.style.padding = "30px";
        div.style.fontFamily = "Arial, sans-serif";
        div.style.position = "relative";
    });
</script>

   


    <!-- jQuery (Required for Owl Carousel & Fancybox) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Fancybox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{URL::asset('js/jquery-3.7.1.min.js" type="5e7ea8a0ed9254eb9dc31750-text/javascript')}}"></script>



    <script src="plugins/select2/js/select2.min.js" type="5e7ea8a0ed9254eb9dc31750-text/javascript"></script>

    <script src="plugins/aos/aos.js" type="5e7ea8a0ed9254eb9dc31750-text/javascript"></script>

    <script src="{{URL::asset('js/backToTop.js" type="5e7ea8a0ed9254eb9dc31750-text/javascript')}}"></script>

    <script src="{{URL::asset('js/feather.min.js" type="5e7ea8a0ed9254eb9dc31750-text/javascript')}}"></script>

    <script src="{{URL::asset('js/owl.carousel.min.js" type="5e7ea8a0ed9254eb9dc31750-text/javascript')}}"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="{{URL::asset('js/script.js" type="5e7ea8a0ed9254eb9dc31750-text/javascript')}}"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="5e7ea8a0ed9254eb9dc31750-|49" defer></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
     <script>
        // Function to scroll to the top when the circle is clicked
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Function to update the progress circle based on the scroll position
        function updateScrollProgress() {
            // Get the total scrollable height
            const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;

            // Get the current scroll position
            const scrollTop = window.scrollY;

            // Calculate the stroke-dashoffset based on the scroll position
            const offset = (scrollTop / docHeight) * 307.919;

            // Update the stroke-dashoffset of the progress circle
            const progressPath = document.getElementById('progress-path');
            progressPath.style.strokeDashoffset = 307.919 - offset; // Reverse the calculation to fill the circle
        }

        // Attach the scroll event to update the progress circle
        window.addEventListener('scroll', updateScrollProgress);
    </script>
    @endif
