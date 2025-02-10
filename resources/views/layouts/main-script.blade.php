{{-- <!-- JS here -->
<script src="{{URL::asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{URL::asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{URL::asset('assets/js/ajax-form.js')}}"></script>
<script src="{{URL::asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{URL::asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{URL::asset('assets/js/scrollIt.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{URL::asset('assets/js/wow.min.js')}}"></script>
<script src="{{URL::asset('assets/js/nice-select.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.slicknav.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL::asset('assets/js/plugins.js')}}"></script>
<script src="{{URL::asset('assets/js/gijgo.min.js')}}"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/livewire@2.3.4/dist/livewire.js"></script>
<!--contact js-->
<script src="{{URL::asset('assets/js/contact.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.form.js')}}"></script>

<script src="{{URL::asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('assets/js/mail-script.js')}}"></script>


<script src="{{URL::asset('assets/js/main.js')}}"></script>
<script>
  // عرض شاشة التحميل عند بداية التحميل
  window.addEventListener('load', function () {
      document.getElementById('loader').style.display = 'none';
  });

  // إظهار شاشة التحميل عند إعادة التحميل
  window.addEventListener('beforeunload', function () {
      document.getElementById('loader').style.display = 'flex';
  });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var dropdownTrigger = document.querySelector('#imgPreview');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    dropdownTrigger.addEventListener('click', function () {
        dropdownMenu.classList.toggle('show');
    });

    document.addEventListener('click', function (event) {
        if (!dropdownTrigger.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});

</script>
@livewireScripts
@yield('js') --}}

<!-- jQuery -->
<script src="{{URL::asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>

<!-- Popper.js -->
<script src="{{URL::asset('assets/js/popper.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

<!-- jQuery Plugins -->
<script src="{{URL::asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.slicknav.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.validate.min.js')}}"></script>

<!-- Other Libraries -->
<script src="{{URL::asset('assets/js/wow.min.js')}}"></script>
<script src="{{URL::asset('assets/js/nice-select.min.js')}}"></script>
<script src="{{URL::asset('assets/js/gijgo.min.js')}}"></script>

<!-- Livewire -->
<script src="//cdn.jsdelivr.net/npm/livewire@2.3.4/dist/livewire.js"></script>

<!-- Custom Scripts -->
<script src="{{URL::asset('assets/js/contact.js')}}"></script>
<script src="{{URL::asset('assets/js/main.js')}}"></script>
@livewireScripts
@yield('js')