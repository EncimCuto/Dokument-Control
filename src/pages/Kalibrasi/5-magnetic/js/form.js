var button = document.getElementById('hamburger');
var div = document.getElementById('new-form');

button.onclick = function() {
    div.classList.toggle('active');
};

// Menghapus class active saat klik di luar new-form dan tombol hamburger
document.addEventListener('click', function(event) {
    var isClickInside = div.contains(event.target) || button.contains(event.target);
    if (!isClickInside) {
        div.classList.remove('active');
    }
});
