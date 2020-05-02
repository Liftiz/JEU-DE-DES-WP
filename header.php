<?php
/*
Template Name: Header
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_title() ?>
    <style>
        .header,
        .header ul {
            display: flex;
            padding: 0px;
        }

        .header {
            background-color: #607d8b;
            color: white;
            height : 60px;
        }

        .header h1 {
            font-size : 30px;
        }

        .header li {
            list-style: none;
            margin-left: 10px;
        }

        .header li a {
            color: white;
        }

        .container {
            padding: 0px;
        }

        .logo {
            height : 100%;
        }

        body,
        html, .form, .container {
            width: 100%;
            height: 100%;
        }

        .form, .custom-row .col, .logo, .grid-row, .column, .game-content {
            display: flex;
        }

        .grid {
            margin-top : 17px;
        }
        
        .grid-row, .game-content {
            justify-content: space-between;
        }

        .column {
            width : 48%;
            background-color : #53565b;
            height : 45px;
            margin-bottom : 10px;
            font-size : 14px;
        }

        .column:hover {
            background-color : gray;
        }

        .form, .column{
            justify-content: center;
            align-items: center;
        }
        
        .custom-row .col, .logo , .column {
            align-items:  center;
        }

        .login {
            width : 400px;
        }

        .login h1 {
            font-size : 23px;
        }

        .game {
            width : 300px;
            padding : 0px 5px;
            padding-top: 10px;
            margin-top: 10px;
            background: #404040;
            color : #c0c0c0;
        }

        .game h3 {
            color : #f8f8f8;
            font-size : 20px;
            margin-left : 30px;
        }

        .game p {
            font-size : 13px;
        }

    </style>
</head>
<?php wp_head() ?>


<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <h1>Site Wordpress de jeu de dés</h1>
            </div>
            
        </div>
    </div>
    <div class="container">