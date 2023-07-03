import { gsap } from "gsap";

/****************************************
    Header
*****************************************/

const headerToggle = (e) => {
    e.preventDefault();
    const headerNav = document.querySelector('.l-header__nav');
    headerNav.classList.toggle('open');
    const tl1 = gsap.timeline();
    if (headerNav.classList.contains('open')) {
        tl1.to('.l-header__nav', {
            duration: 1,
            autoAlpha: 1,
        }).to('.l-header__button-border', {
            duration: 1,
            backgroundColor: '#fff',
            onStart: () => {
                const tl2 = gsap.timeline();
                tl2.to('.l-header__button-border--top, .l-header__button-border--bottom', {
                    duration: 0.25,
                    top: '50%',
                }).to('.l-header__button-border--top', {
                    duration: 0.25,
                    rotate: 45,
                }).to('.l-header__button-border--bottom', {
                    duration: 0.25,
                    rotate: -45,
                }, '<').to('.l-header__button-border--center', {
                    duration: 0.25,
                    x: -50,
                    opacity: 0,
                })
            },
        }, '<').to('.l-header__nav-list li', {
            autoAlpha: 1,
            stagger: {
                amount: 0.3,
                from: 'start'
            }
        }, '-=0.5')
    } else {
        tl1.to('.l-header__nav-list li', {
            autoAlpha: 0,
            stagger: {
                amount: 0.3,
                from: 'end'
            }
        }).to('.l-header__nav', {
            duration: 1,
            autoAlpha: 0,
        }).to('.l-header__button-border', {
            duration: 1,
            backgroundColor: '#000',
            onStart: () => {
                const tl2 = gsap.timeline();
                tl2.to('.l-header__button-border--top, .l-header__button-border--bottom', {
                    duration: 0.25,
                    rotate: 0,
                }).to('.l-header__button-border--top', {
                    duration: 0.25,
                    top: '0%',
                }).to('.l-header__button-border--bottom', {
                    duration: 0.25,
                    top: '100%',
                }, '<').to('.l-header__button-border--center', {
                    duration: 0.25,
                    x: 0,
                    opacity: 1,
                })
            },
        }, '<')
    }
};

const headerButton = document.querySelector('.l-header__button');
headerButton.addEventListener('click', headerToggle);
