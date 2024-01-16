const themeSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
themeSwitch.addEventListener('change', toggleTheme);
function toggleTheme() {
    if (themeSwitch.checked) {
        setLightMode();
    } else {
        setDarkMode();
    }
}
function setDarkMode() {
    document.body.classList.add('dark');
    setCookie('mmichy_theme', 'dark', 30);
}
function setLightMode() {
    document.body.classList.remove('dark');
    setCookie('mmichy_theme', 'light', 30);
}
function setCookie(name, value, days) {
    const expires = new Date(Date.now() + days * 24 * 60 * 60 * 1000).toUTCString();
    document.cookie = `${name}=${value}; expires=${expires}; path=/`;
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
const ul = document.querySelector('header ul');
const hover = document.querySelector('header .hover');
const navLinks = document.querySelectorAll('header ul li a');
let currentWidth = window.innerWidth;

if (currentWidth > 900) {
    navLinks.forEach((item) => {
        item.addEventListener('mouseenter', () => {
            hover.style.opacity = '0.9';
            set(item);
        });

        item.addEventListener('mouseleave', () => {
            hover.style.opacity = '0';
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
let moveTimeout;
let zIndexCounter = 2;

document.querySelectorAll(".program").forEach(program => {
    const file = program.querySelector('.file');
    const close = program.querySelector('.close');
    const maximize = program.querySelector('.maximize');
    const minimize = program.querySelector('.minimize');

    file.addEventListener('click', () => { if (!isMobile()) {activateWindow(program); toggleWindow(program);}});
    close.addEventListener('click', () => { if (!isMobile()) {deactivateWindow(program); toggleWindow(program);} });
    maximize.addEventListener('click', () => { if (!isMobile()) {activateWindow(program); maximizeWindow(program);} });
    minimize.addEventListener('click', () => { if (!isMobile()) {deactivateWindow(program); minimizeWindow(program);} });

    program.addEventListener('mousedown', () => {
        if (!isMobile()) {
            activateWindow(program);
            if (program.classList.contains('open')) {
                program.style.zIndex = zIndexCounter++;
            }
        }
    });
});

function activateWindow(program) {
    document.querySelectorAll(".program").forEach(window => window.classList.remove('active'));
    program.classList.add('active');
}

function deactivateWindow(program) {
    program.classList.remove('active');
}

function toggleWindow(program) {
    const isOpen = program.classList.toggle('open');

    if (isOpen) {
        program.dataset.draggable = "1";
        program.style.zIndex = zIndexCounter++;
    } else {
        program.dataset.draggable = "0";
        program.style.zIndex = "1";
        const file = program.querySelector('.file');
        const fileRect = file.getBoundingClientRect();

        if (fileRect.left > window.innerWidth - fileRect.width) {
            program.style.left = `${window.innerWidth - 50}px`;
        }
        if (fileRect.left < 0 - fileRect.width) {
            program.style.left = `50px`;
        }
        if (fileRect.top > window.innerHeight - fileRect.height) {
            program.style.top = `${window.innerHeight - 50}px`;
        }
        if (fileRect.top < 0 - fileRect.height) {
            program.style.top = `50px`;
        }
    }
}

function maximizeWindow(program) {
    program.dataset.draggable = (program.dataset.draggable === "1") ? "0" : "1";
    program.style.zIndex = zIndexCounter++;
    program.classList.toggle('maximized');
}

function minimizeWindow(program) {
    if (program.classList.contains('maximized')) {
        program.classList.remove('maximized');
        program.dataset.draggable = "1";
        program.style.zIndex = zIndexCounter++;
    } else {
        toggleWindow(program);
    }
}

document.addEventListener('mousedown', event => {
    const activeProgram = document.querySelector(".program.active");
    if (!activeProgram || !event.target.closest(".program")) {
        deactivateWindow(activeProgram);
    }
});

document.querySelectorAll(".program").forEach(program => {
    let isDragging = false;
    let offsetX, offsetY;

    function handleMouseDown(event) {
        isDragging = true;
        document.body.style.userSelect = "none";
        offsetX = event.clientX - program.getBoundingClientRect().left;
        offsetY = event.clientY - program.getBoundingClientRect().top;
        program.style.transition = "none";
    }

    function handleMouseMove(event) {
        if (program.dataset.draggable === "1" && isDragging) {
            const x = event.clientX - offsetX;
            const y = event.clientY - offsetY;
            program.style.left = `${x}px`;
            program.style.top = `${y}px`;
            if (moveTimeout) clearTimeout(moveTimeout);
            if (program.classList.contains('open')) {
                moveTimeout = setTimeout(handleMouseUp, 100);
            }
        }
    }

    function handleMouseUp() {
        isDragging = false;
        document.body.style.userSelect = "auto";
        program.style.transition = "all 0.4s";

        let file = program.querySelector('.file');
        let fileRect = file.getBoundingClientRect();

        if (fileRect.left > window.innerWidth - fileRect.width) {
            program.style.left = `${window.innerWidth - 50}px`;
        }
        if (fileRect.left < 0 - fileRect.width) {
            program.style.left = `50px`;
        }
        if (fileRect.top > window.innerHeight - fileRect.height) {
            program.style.top = `${window.innerHeight - 50}px`;
        }
        if (fileRect.top < 0 - fileRect.height) {
            program.style.top = `50px`;
        }
    }

    program.addEventListener("mousedown", handleMouseDown);
    program.addEventListener("mousemove", handleMouseMove);
    program.addEventListener("mouseup", handleMouseUp);
});

function isClickOutside(event, element) {
    return !element.contains(event.target);
}

window.addEventListener('click', event => {
    document.querySelectorAll(".program.maximized").forEach(program => {
        if (isClickOutside(event, program)) {
            minimizeWindow(program);
        }
    });
});

document.querySelectorAll(".program").forEach(program => {
    program.addEventListener('mousedown', () => {
        if (!isMobile()) {
            if (program.classList.contains('open')) {
                program.style.zIndex = zIndexCounter++;
            }
        }
    });
});
window.addEventListener('resize', () => {
    windowResize();
});
function windowResize() {
    if (isMobile()) {
        document.querySelectorAll(".program").forEach(program => {
            program.dataset.draggable = "0";
            program.style.zIndex = "2";
            zIndexCounter = 3;
        });
    } else {
        document.querySelectorAll(".program").forEach(program => {
            program.dataset.draggable = "1";
        });
    }
}
function isMobile() {
    return window.innerWidth < 990;
}