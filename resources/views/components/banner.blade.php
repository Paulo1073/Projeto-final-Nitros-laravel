<div class="relative max-w-7xl mx-auto h-100  mt-10 overflow-hidden rounded-lg shadow-lg">
    <!-- Slides -->
    <div class="absolute inset-0 transition-opacity duration-1000 opacity-100" id="slide1">
        <img src="{{ asset('assets/images/1.jpg') }}" class="w-full h-full object-cover" alt="Banner 1">
    </div>

    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide2">
        <img src="{{ asset('assets/images/2.jpg') }}" class="w-full h-full object-cover" alt="Banner 2">
    </div>

    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide3">
        <img src="{{ asset('assets/images/3.jpg') }}" class="w-full h-full object-cover" alt="Banner 3">
    </div>

    <!-- Indicadores -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <div class="w-3 h-3 bg-white rounded-full opacity-70" id="dot1"></div>
        <div class="w-3 h-3 bg-white rounded-full opacity-40" id="dot2"></div>
        <div class="w-3 h-3 bg-white rounded-full opacity-40" id="dot3"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let slides = [
        document.getElementById('slide1'),
        document.getElementById('slide2'),
        document.getElementById('slide3')
    ];
    let dots = [
        document.getElementById('dot1'),
        document.getElementById('dot2'),
        document.getElementById('dot3')
    ];

    let current = 0;

    setInterval(() => {
        slides[current].classList.remove('opacity-100');
        slides[current].classList.add('opacity-0');
        dots[current].classList.remove('opacity-70');
        dots[current].classList.add('opacity-40');

        current = (current + 1) % slides.length;

        slides[current].classList.remove('opacity-0');
        slides[current].classList.add('opacity-100');
        dots[current].classList.remove('opacity-40');
        dots[current].classList.add('opacity-70');
    }, 5000);
});
</script>
