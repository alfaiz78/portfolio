$(function() {
    "use strict";

    // Sidebar menu js
    $.sidebarMenu($('.sidebar-menu'));

    // Toggle menu js
    $(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    // Sidebar menu activation js
    $(function() {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function() {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    });

    /* Top Header */
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 60) {
            $('.topbar-nav .navbar').addClass('bg-dark');
        } else {
            $('.topbar-nav .navbar').removeClass('bg-dark');
        }
    });

    /* Back To Top */
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });

    $('.back-to-top').on("click", function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();

    // Theme setting
    $(".switcher-icon").on("click", function(e) {
        e.preventDefault();
        $(".right-sidebar").toggleClass("right-toggled");
    });

    // Function to apply the theme from localStorage
    function applyTheme(themeClass) {
        $('body').attr('class', 'bg-theme ' + themeClass);
        $('#theme-container').attr('class', 'bg-theme ' + themeClass); // Also apply to theme-container
    }

    // Check if a theme is already saved in localStorage
    $(document).ready(function() {
        var savedTheme = localStorage.getItem('selectedTheme');
        if (savedTheme) {
            applyTheme(savedTheme);
        }
    });

    // Function to set the theme and save to localStorage
    function setTheme(themeClass) {
        applyTheme(themeClass);
        localStorage.setItem('selectedTheme', themeClass);
    }

    // Theme change functions
    $('.theme-btn').click(function() {
        const themeClass = $(this).attr('id').replace('theme', 'bg-theme');
        setTheme(themeClass);
    });

    // Add event listeners for specific theme buttons
    for (let i = 1; i <= 15; i++) {
        $(`#theme${i}`).click(function() {
            setTheme(`bg-theme${i}`);
        });
    }
});
