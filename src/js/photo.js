// core version + navigation, pagination modules:
import Swiper, { Autoplay } from 'swiper';
// import Swiper and modules styles
import 'swiper/css';
// init Swiper:
new Swiper('.swiper', {
    modules: [Autoplay],
    autoplay: {
        delay: 0,
        disableOnInteraction: false, //ユーザーがスワイプなどの操作しても止まらない
    },
    loop: true,
    spaceBetween: 20,
    slidesPerView: 2,
    speed: 3000,
    allowTouchMove: false, // スワイプ無効,
    breakpoints: {
        768: {
            slidesPerView: 4,
            spaceBetween: 70,
        }
    },
});

