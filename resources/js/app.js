import './bootstrap';

const toggleBtns = document.getElementsByClassName('toggle-btn')[0];
const navbarLinks = document.getElementsByClassName('navbar-links')[0];
var prevScrollpos = window.pageYOffset;

toggleBtns.addEventListener('click', (event) => {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của sự kiện click
    navbarLinks.classList.toggle('active');
});

window.onscroll = function () {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-130px";
    }
    prevScrollpos = currentScrollPos;
}

