const themeSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
themeSwitch.addEventListener('change', toggleTheme);
if (localStorage.getItem('mode') === 'dark') {
    setDarkMode();
} else {
    setLightMode();
}
function toggleTheme() {
    if (themeSwitch.checked) {
        setDarkMode();
    } else {
        setLightMode();
    }
}
function setDarkMode() {
    themeSwitch.checked = true;
    document.body.classList.add('dark');
    localStorage.setItem('mode', 'dark');
}
function setLightMode() {
    document.body.classList.remove('dark');
    localStorage.setItem('mode', 'light');
}
const ul = document.querySelector('header ul');
const hover = document.querySelector('header .hover');
const navLinks = document.querySelectorAll('header ul li a');
let currentWidth = window.innerWidth;

if (currentWidth > 990) {
    navLinks.forEach((item) => {
        item.addEventListener('mouseenter', () => {
            hover.style.opacity = '0.9';
            set(item);
        });

        item.addEventListener('mouseleave', () => {
            if (document.body.classList.contains('dark')) {
                hover.style.opacity = '0.3';
            } else {
                hover.style.opacity = '0.1';
            }
        });
    });

    function set(item) {
        let position = item.getBoundingClientRect();
        let ulPosition = ul.getBoundingClientRect();
        hover.style.left = position.left - ulPosition.left - 15 + 'px';
        hover.style.width = position.width + 'px';
        hover.style.height = position.height + 'px';
    }
}

const menuButton = document.querySelector('#menu-button');
const nav = document.querySelector('header nav');
const menuButtonSpan1 = menuButton.querySelector('span:nth-child(1)');
const menuButtonSpan2 = menuButton.querySelector('span:nth-child(2)');

let menuClosed = true;

menuButton.addEventListener('click', function () {
    if (menuClosed) {
        menuClosed = false;
        nav.style.gap = '0px';
        nav.classList.remove('disappear');
        nav.classList.add('appear');
        menuButtonSpan1.style.transform = 'translateY(6.75px) rotate(45deg)';
        menuButtonSpan2.style.transform = 'translateY(-6.75px) rotate(-45deg)';
    } else {
        menuClosed = true;
        nav.style.gap = '8px';
        nav.classList.remove('appear');
        nav.classList.add('disappear');
        menuButtonSpan1.style.transform = 'rotate(0deg)';
        menuButtonSpan2.style.transform = 'rotate(0deg)';
    }
});
window.addEventListener('resize', ()=> {
    let currentWidth = window.innerWidth;
    if (currentWidth > 990) {
        menuClosed = true;
        nav.style.gap = '30px';
        nav.classList.remove('disappear');
        nav.classList.add('appear');
        menuButtonSpan1.style.transform = 'rotate(0deg)';
        menuButtonSpan2.style.transform = 'rotate(0deg)';
    } else {
        if (menuClosed) {
            nav.style.gap = '8px';
            nav.classList.remove('appear');
            nav.classList.add('disappear');
            menuButtonSpan1.style.transform = 'rotate(0deg)';
            menuButtonSpan2.style.transform = 'rotate(0deg)';
        }
    }
})