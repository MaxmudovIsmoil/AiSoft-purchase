
const html = $('html');
const body = $('body');
const headerNavbar = $('.header-navbar');
const mainMenu = $('.main-menu');
const icon = $('.ficon');


$("#theme-toggle").click(function () {

    if (html.data("theme") === "dark") {

        html.data("theme", "light");
        localStorage.setItem('dark', 'false');

        html.removeClass('dark-layout')
        html.addClass('light-layout')

        headerNavbar.addClass('navbar-light');
        headerNavbar.removeClass('navbar-dark');
        mainMenu.addClass('menu-light')
        mainMenu.removeClass('menu-dark')
        icon.removeClass('fa-sun')
        icon.addClass('fa-moon')
    }
    else {
        localStorage.setItem('dark', 'true');
        html.data("theme", "dark");

        html.removeClass('light-layout')
        html.addClass('dark-layout')

        headerNavbar.removeClass('navbar-light');
        headerNavbar.addClass('navbar-dark');
        mainMenu.removeClass('menu-light')
        mainMenu.addClass('menu-dark')
        icon.removeClass('fa-moon')
        icon.addClass('fa-sun')
    }
});


if (localStorage.getItem('dark') === "true") {
    if (html.hasClass('light-layout')) {
        html.removeClass('light-layout')
    }
    html.addClass('dark-layout')

    headerNavbar.removeClass('navbar-light');
    headerNavbar.addClass('navbar-dark');
    mainMenu.removeClass('menu-light')
    mainMenu.addClass('menu-dark')
    icon.removeClass('fa-moon')
    icon.addClass('fa-sun')
}
else {
    if (html.hasClass('dark-layout')) {
        html.removeClass('dark-layout')
    }
    html.addClass('light-layout')

    headerNavbar.addClass('navbar-light');
    headerNavbar.removeClass('navbar-dark');
    mainMenu.addClass('menu-light')
    mainMenu.removeClass('menu-dark')
    icon.removeClass('fa-sun')
    icon.addClass('fa-moon')

}

