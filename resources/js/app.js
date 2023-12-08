import './bootstrap';

const toggleBtns = document.getElementsByClassName('toggle-btn')[0];
const navbarLinks = document.getElementsByClassName('navbar-links')[0];
let prevScrollpos = window.pageYOffset;
const imageInput = document.getElementById('img');
const imagePreview = document.getElementById('preview');

toggleBtns.addEventListener('click', (event) => {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của sự kiện click
    navbarLinks.classList.toggle('active');
});

window.onscroll = function () {
    const currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-130px";
    }
    prevScrollpos = currentScrollPos;
}


imageInput.addEventListener('change', function() {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        imagePreview.style.display = 'block';
        imagePreview.src = e.target.result;
    }
    reader.readAsDataURL(file);
  } else {
    imagePreview.src = '';
  }
});
