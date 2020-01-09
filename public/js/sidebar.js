window.onload = function () {
    document.querySelector('#menu-toggle').addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector('#wrapper').classList.toggle('toggled');
    });
};
