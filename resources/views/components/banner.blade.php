<div class="relative w-[1477px] mx-auto h-[572px]  overflow-hidden  ">
    <!-- Slides -->
    <div class="absolute inset-0 transition-opacity duration-1000 opacity-100" id="slide1">
        <img src="{{ asset('assets/images/4.png') }}" class="w-full h-full object-cover" alt="Banner 1">
    </div>

    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide2">
        <img src="{{ asset('assets/images/5.png') }}" class="w-full h-full object-cover" alt="Banner 2">
    </div>

    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide3">
        <img src="{{ asset('assets/images/6.png') }}" class="w-full h-full object-cover" alt="Banner 3">
    </div>

    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide4">
        <img src="{{ asset('assets/images/7.png') }}" class="w-full h-full object-cover" alt="Banner 4">
    </div>

    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide5">
        <img src="{{ asset('assets/images/8.png') }}" class="w-full h-full object-cover" alt="Banner 5">
    </div>

    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide6">
        <img src="{{ asset('assets/images/9.png') }}" class="w-full h-full object-cover" alt="Banner 6">
    </div>

    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide7">
        <img src="{{ asset('assets/images/10.png') }}" class="w-full h-full object-cover" alt="Banner 7">
    </div>





    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <div class="w-3 h-3 bg-white rounded-full opacity-70" id="dot1"></div>
        <div class="w-3 h-3 bg-white rounded-full opacity-40" id="dot2"></div>
        <div class="w-3 h-3 bg-white rounded-full opacity-40" id="dot3"></div>
        <div class="w-3 h-3 bg-white rounded-full opacity-40" id="dot4"></div>
        <div class="w-3 h-3 bg-white rounded-full opacity-40" id="dot5"></div>
        <div class="w-3 h-3 bg-white rounded-full opacity-40" id="dot6"></div>
        <div class="w-3 h-3 bg-white rounded-full opacity-40" id="dot7"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let slides = [
        document.getElementById('slide1'),
        document.getElementById('slide2'),
        document.getElementById('slide3'),
        document.getElementById('slide4'),
        document.getElementById('slide5'),
        document.getElementById('slide6'),
        document.getElementById('slide7')
    ];
    let dots = [
        document.getElementById('dot1'),
        document.getElementById('dot2'),
        document.getElementById('dot3'),
        document.getElementById('dot4'),
        document.getElementById('dot5'),
        document.getElementById('dot6'),
        document.getElementById('dot7')

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
