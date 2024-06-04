window.addEventListener('load', function() {
    var navbarHeight = document.querySelector('.navbar').offsetHeight;
    document.querySelector('.nav_mg').style.marginTop = navbarHeight + 'px';
});

window.addEventListener('resize', function() {
    var navbarHeight = document.querySelector('.navbar').offsetHeight;
    document.querySelector('.nav_mg').style.marginTop = navbarHeight + 'px';
});

