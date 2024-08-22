window.onload = function() {
    var navbarToggle = document.getElementById('navbar-toggle');
    var navbar = document.getElementById('navbar');

    navbarToggle.addEventListener('click', function() {
        navbar.classList.toggle('active');
    });

    function closeNavbar() {
        if (window.innerWidth > 900) {
            navbar.classList.remove('active');
        }
    }

    window.addEventListener('resize', closeNavbar);
};
