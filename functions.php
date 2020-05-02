<?php
function montheme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support("menus");
    register_nav_menu("header", "En tete de menu");
    register_post_type('lancement', [
        "label" => "lancement",
        "public" => true,
        "supports" => ["title", "editor", "author", "data"]
    ]);
}


function register_assets()
{
    wp_register_style("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");
    wp_register_script("bootstrapjs", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", [], false, true);
    wp_register_script("popperjs", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", [], false, true);
    wp_deregister_script('jquery');
    wp_register_script("jquery", "https://code.jquery.com/jquery-3.4.1.slim.min.js", [], false, true);
    wp_enqueue_script("bootstrapjs");
    wp_enqueue_script("popperjs");
    wp_enqueue_script("jquery");
    wp_enqueue_style("bootstrap");
}

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

add_action('send_headers', 'site_router');

function site_router()
{
    $root = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    $url = str_replace($root, '', $_SERVER['REQUEST_URI']);
    $url = explode('/', $url);
    if (count($url) == 1) {
        if (is_user_logged_in()) {

            if ($url[0] == 'logout') {
                require "tpl-logout.php";
                die();
            } else {
               
            }
        } else {
            if ($url[0] === "register") {
                require "tpl-register.php";
            } else {
                require "tpl-login.php";
            }

            die();
        }
    }

    if (!is_user_logged_in()) {
        header("Location: http://localhost/wordpress/login", true);
        exit();
    }
}

add_action("after_setup_theme", "montheme_support");
add_action("wp_enqueue_scripts", "register_assets");
