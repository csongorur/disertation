
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

document.addEventListener('DOMContentLoaded', function (event) {

    // Mobile menu toggle
    let button = document.getElementById('mobile-menu-btn');
    let closeBtn = document.querySelector('.close');
    let menu = document.querySelector('.mobile-menu');

    button.addEventListener('click', function() {
        menu.classList.add('show');
    });

    closeBtn.addEventListener('click', function() {
        menu.classList.remove('show');
    });

    // Hide alerts.
    setTimeout(function () {
        let alerts = document.querySelectorAll('.alert-auto-close');

        for (let i = 0; i < alerts.length; i++) {
            alerts[i].classList.add('d-none');
        }
    }, 5000);
});