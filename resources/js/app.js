import './bootstrap';
import Alpine from 'alpinejs';

import AOS from 'aos';
import 'aos/dist/aos.css';

import '@lottiefiles/lottie-player';

AOS.init({
    duration: 800,
    once: true,
});

window.Alpine = Alpine;
Alpine.start();
