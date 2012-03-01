# Cinch Framework

A simple, procedural, non-OOP MVC framework for PHP

## Usage

### Initial setup

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

Controllers are located in the `controllers` directory and follow a strict naming convention. As an example, if we were to visit the url `http://example.com/blog/` then your controller would be named `BlogController.php`. As for the source:

    <?php
    /**
     * Example Controller
     */
    namespace BlogController;

    function index()
    {
        echo 'Default action!';
    }

    function tags()
    {
        echo 'The tags action!';
    }

    function tagged($tags)
    {
        echo 'The tagged action with the following parameter:' . $tags;
    }

The first thing you should have noticed is we declared a namespace `BlogController`. This namespace, which helps keep Cinch organized, must be the same name as your controller source file. Next we have declared three actions: `index`, `tags`, and `tagged`. Index is the default action and will only be called if no action is present in the URL. So, following the above example, if we visited `http://example.com/blog/` the default action would be called. If we were to visit the url `http://example.com/blog/tags/` then the `tags` function would be called. Finally if we want to pass in parameters to an action, such as the tag `php`, we simply add it to the URL: `http://example.com/blog/tagged/php/`.

### Views

Cinch uses native PHP files for its views. To load a view simply use the `Load` namespace and the `view` function:

    <?php
    function index()
    {
        \Load\view('index');
    }