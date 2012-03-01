# Cinch Framework

A simple, procedural, non-OOP MVC framework for PHP

## Usage

### Directory organization

Cinch uses a strict directory structure ensuring your project is organized properly:

    \webroot
        \cinch
            Config.php
            Load.php
            Request.php
            Router.php
            Uri.php
        \controllers
        \models
        \modules
        \views
        .htaccess
        index.php

### Controllers

Controllers are located in the `controllers` directory and follow a strict naming convention. As an example: if we were to visit the url `http://example.com/foo/` then your controller would be named `FooController.php`. As for the source:

    <?php
    namespace FooController;

    function index()
    {
        echo 'Default action!';
    }

    function bar()
    {
        echo 'The bar action!';
    }

In the source above you may have noticed that we have two routes declared: `index` and `bar`. Index is the default action called if no action is present in the URL. If we were to visit the url `http://example.com/foo/bar/` then the `bar` function would be called.