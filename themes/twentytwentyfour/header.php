<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <meta name="theme-color" content="#004d35" />
    <meta name="description" content="Telesens global solutions" />
    <link rel="apple-touch-icon" href="/logo192.png" />
    <link rel="manifest" href="/manifest.json" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BKQBLFP3ZT"></script>
    <script>
        function gtag() {
            dataLayer.push(arguments)
        }
        window.dataLayer = window.dataLayer || [], gtag("js", new Date), gtag("config", "G-BKQBLFP3ZT")
    </script>
    <title>Telesens</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="<?php echo path('css', 'style.css') ?>" rel="stylesheet">
    <link href="<?php echo path('css', 'additional.css') ?>" rel="stylesheet">
    <link href="<?php echo path('css', 'slider.css') ?>" rel="stylesheet">

</head>

<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>

    <section id="splash-screen" class="splash">
        <div class="splash-container">
            <svg width="700" height="500" viewBox="0 0 500 700" fill="none" xmlns="http://www.w3.org/2000/svg">
                <text x="40%" y="50%" text-anchor="end">TELE</text>
                <text x="40%" y="50%" text-anchor="start">SENS</text>
            </svg>
        </div>
    </section>

    <main id="root">
        <div id="cursor">
            <span class="material-symbols-outlined arrow_left">
                arrow_back
            </span>
            <span class="material-symbols-outlined arrow_right">
                arrow_forward
            </span>
            <span class="material-symbols-outlined arrow_right_long">
                arrow_right_alt
            </span>
            <div class="input-bg"></div>
        </div>
        <div id="cursor-border"></div>

        <div class="fade bg-navy-green"></div>
        <?php get_template_part('menu'); ?>