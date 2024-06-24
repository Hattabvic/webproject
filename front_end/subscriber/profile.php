<?php
// require_once('dark_mode.php');
session_start();
require_once('header.php');
require_once('../../classes.php');
$user = unserialize($_SESSION["user"]);
$my_posts = $user->myposts($user->id);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="file"] {
            padding: 3px;
        }

        .like-btn {
            background-color: #007bff;

            border-color: #007bff;
            padding: 0.5rem 1rem;

        }

        .comment-icon:hover {
            color: #007bff;

        }

        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");




        .container {
            height: 65vh;
        }

        .card-pro {

            background-color: saddlebrown;
            font-family: "Poppins", sans-serif;
            font-weight: 300;
            width: 380px;
            border: none;
            border-radius: 15px;
            padding: 8px;

            position: relative;
            height: 370px;
        }

        .profile img {


            height: 80px;
            width: 80px;
            margin-top: 2px;


        }

        .like-button {
            background-color: #3366ff;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }





        /* Component: Mini Profile Widget */
        .mini-profile-widget .image-container .avatar {
            width: 180px;
            height: 180px;
            display: block;
            margin: 0 auto;
            border-radius: 50%;
            background: white;
            padding: 4px;
            border: 1px solid #dddddd;
        }

        .mini-profile-widget .details {
            text-align: center;
        }



        /* Component: Panel */
        .panel {
            border-radius: 0;
            margin-bottom: 30px;
        }

        .panel.solid-color {
            color: white;
        }

        .panel .panel-heading {
            border-radius: 0;
            position: relative;
        }

        .panel .panel-heading>.controls {
            position: absolute;
            right: 10px;
            top: 12px;
        }

        .panel .panel-heading>.controls .nav.nav-pills {
            margin: -8px 0 0 0;
        }

        .panel .panel-heading>.controls .nav.nav-pills li a {
            padding: 5px 8px;
        }

        .panel .panel-heading .clickable {
            margin-top: 0px;
            font-size: 12px;
            cursor: pointer;
        }

        .panel .panel-heading.no-heading-border {
            border-bottom-color: transparent;
        }

        .panel .panel-heading .left {
            float: left;
        }

        .panel .panel-heading .right {
            float: right;
        }

        .panel .panel-title {
            font-size: 16px;
            line-height: 20px;
        }

        .panel .panel-title.panel-title-sm {
            font-size: 18px;
            line-height: 28px;
        }

        .panel .panel-title.panel-title-lg {
            font-size: 24px;
            line-height: 34px;
        }

        .panel .panel-body {
            font-size: 13px;
        }

        .panel .panel-body>.body-section {
            margin: 0px 0px 20px;
        }

        .panel .panel-body>.body-section>.section-heading {
            margin: 0px 0px 5px;
            font-weight: bold;
        }

        .panel .panel-body>.body-section>.section-content {
            margin: 0px 0px 10px;
        }

        .panel-white {
            border: 1px solid #dddddd;
        }

        .panel-white>.panel-heading {
            color: #333;
            background-color: #fff;
            border-color: #ddd;
        }

        .panel-white>.panel-footer {
            background-color: #fff;
            border-color: #ddd;
        }

        .panel-primary {
            border: 1px solid #dddddd;
        }

        .panel-purple {
            border: 1px solid #dddddd;
        }

        .panel-purple>.panel-heading {
            color: #fff;
            background-color: #8e44ad;
            border: none;
        }

        .panel-purple>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-light-purple {
            border: 1px solid #dddddd;
        }

        .panel-light-purple>.panel-heading {
            color: #fff;
            background-color: #9b59b6;
            border: none;
        }

        .panel-light-purple>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-blue,
        .panel-info {
            border: 1px solid #dddddd;
        }

        .panel-blue>.panel-heading,
        .panel-info>.panel-heading {
            color: #fff;
            background-color: #2980b9;
            border: none;
        }

        .panel-blue>.panel-heading .panel-title a:hover,
        .panel-info>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-light-blue {
            border: 1px solid #dddddd;
        }

        .panel-light-blue>.panel-heading {
            color: #fff;
            background-color: #3498db;
            border: none;
        }

        .panel-light-blue>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-green,
        .panel-success {
            border: 1px solid #dddddd;
        }

        .panel-green>.panel-heading,
        .panel-success>.panel-heading {
            color: #fff;
            background-color: #27ae60;
            border: none;
        }

        .panel-green>.panel-heading .panel-title a:hover,
        .panel-success>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-light-green {
            border: 1px solid #dddddd;
        }

        .panel-light-green>.panel-heading {
            color: #fff;
            background-color: #2ecc71;
            border: none;
        }

        .panel-light-green>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-orange,
        .panel-warning {
            border: 1px solid #dddddd;
        }

        .panel-orange>.panel-heading,
        .panel-warning>.panel-heading {
            color: #fff;
            background-color: #e82c0c;
            border: none;
        }

        .panel-orange>.panel-heading .panel-title a:hover,
        .panel-warning>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-light-orange {
            border: 1px solid #dddddd;
        }

        .panel-light-orange>.panel-heading {
            color: #fff;
            background-color: #ff530d;
            border: none;
        }

        .panel-light-orange>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-red,
        .panel-danger {
            border: 1px solid #dddddd;
        }

        .panel-red>.panel-heading,
        .panel-danger>.panel-heading {
            color: #fff;
            background-color: #d40d12;
            border: none;
        }

        .panel-red>.panel-heading .panel-title a:hover,
        .panel-danger>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-light-red {
            border: 1px solid #dddddd;
        }

        .panel-light-red>.panel-heading {
            color: #fff;
            background-color: #ff1d23;
            border: none;
        }

        .panel-light-red>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-pink {
            border: 1px solid #dddddd;
        }

        .panel-pink>.panel-heading {
            color: #fff;
            background-color: #fe31ab;
            border: none;
        }

        .panel-pink>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-light-pink {
            border: 1px solid #dddddd;
        }

        .panel-light-pink>.panel-heading {
            color: #fff;
            background-color: #fd32c0;
            border: none;
        }

        .panel-light-pink>.panel-heading .panel-title a:hover {
            color: #f0f0f0;
        }

        .panel-group .panel {
            border-radius: 0;
        }

        .panel-group .panel+.panel {
            margin-top: 0;
            border-top: 0;
        }

        /* Component: Posts */
        .post .post-heading {
            height: 95px;
            padding: 20px 15px;
        }

        .post .post-heading .avatar {
            width: 60px;
            height: 60px;
            display: block;
            margin-right: 15px;
        }

        .post .post-heading .meta .title {
            margin-bottom: 0;
        }

        .post .post-heading .meta .title a {
            color: black;
        }

        .post .post-heading .meta .title a:hover {
            color: #aaaaaa;
        }

        .post .post-heading .meta .time {
            margin-top: 8px;
            color: #999;
        }

        .post .post-image .image {
            width: 100%;
            height: auto;
        }

        .post .post-description {
            padding: 15px;
        }

        .post .post-description p {
            font-size: 14px;
        }

        .post .post-description .stats {
            margin-top: 20px;
        }

        .post .post-description .stats .stat-item {
            display: inline-block;
            margin-right: 15px;
        }

        .post .post-description .stats .stat-item .icon {
            margin-right: 8px;
        }

        .post .post-footer {
            border-top: 1px solid #ddd;
            padding: 15px;
        }

        .post .post-footer .input-group-addon a {
            color: #454545;
        }

        .post .post-footer .comments-list {
            padding: 0;
            margin-top: 20px;
            list-style-type: none;
        }

        .post .post-footer .comments-list .comment {
            display: block;
            width: 100%;
            margin: 20px 0;
        }

        .post .post-footer .comments-list .comment .avatar {
            width: 35px;
            height: 35px;
        }

        .post .post-footer .comments-list .comment .comment-heading {
            display: block;
            width: 100%;
        }

        .post .post-footer .comments-list .comment .comment-heading .user {
            font-size: 14px;
            font-weight: bold;
            display: inline;
            margin-top: 0;
            margin-right: 10px;
        }

        .post .post-footer .comments-list .comment .comment-heading .time {
            font-size: 12px;
            color: #aaa;
            margin-top: 0;
            display: inline;
        }

        .post .post-footer .comments-list .comment .comment-body {
            margin-left: 50px;
        }

        .post .post-footer .comments-list .comment>.comments-list {
            margin-left: 50px;
        }

        .fluid-width-video-wrapper {
            width: 100%;
            position: relative;
            padding: 0;
        }

        .fluid-width-video-wrapper iframe,
        .fluid-width-video-wrapper object,
        .fluid-width-video-wrapper embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>
    <main>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card-pro">
                <div class="user text-center">
                    <div class="profile">

                        <img src="<?php if (!empty($user->image)) echo $user->image;
                                    else echo 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' ?>" class="rounded-circle" alt="User Image" width="150" height="150">
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <h4 class="mb-0"><?= $user->first_name ?></h4>
                    <span class="text-muted d-block mb-2"><?= $user->role ?></span>
                    <form action="store_user_image.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" style="width: 100%" id="">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Add
                        </button>
                        <button type="submit" name="delete" class="btn btn-danger">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        </div>
        <div class="form-container">
            <h2 class="text-center">Enter The Post</h2>
            <form action="storePoste.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="titleHelp" required />
                    <small id="titleHelp" class="text-muted">Help text</small>
                </div>
                <div class="form-group mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="contentArea" class="form-control" rows="4" aria-describedby="contentHelp" required></textarea>
                    <small id="contentHelp" class="text-muted">Help text</small>
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" aria-describedby="imageHelp" />
                    <small id="imageHelp" class="text-muted">Help text</small>
                </div>
                <button type="submit" class="btn btn-primary w-100">Done</button>
            </form>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($my_posts as $posts) {
                ?>
                    <div class="col-sm-12">
                        <div class="panel panel-white post">
                            <div class="post-heading">
                                <div class="pull-left image">
                                    <img style="width:50px ; height: 50px; border-radius:50px;" src="<?php if (!empty($user->image)) echo $user->image;
                                                                                                        else echo 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' ?>">
                                    <he class="mb-0"><?= $user->first_name ?><?= " " . $user->last_name ?></h6> <br>
                                </div>
                                <div class="pull-left meta">
                                    <h6 class="text-muted time"> <span><?= $posts["created_at"] ?></span></h6>
                                </div>
                            </div>
                            <div class="post-image">
                                <?php if (!empty($posts['image'])) { ?>
                                    <img class="card-img-top" src="<?= $posts['image'] ?>" alt="title" style="max-height: 900px; object-fit: contain; width: 100%;" />
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?= $posts['title'] ?></h4>
                                <p class="card-text"><?= $posts['content'] ?></p>
                                <p class="card-text">
                                    <small class="text-muted">Published on <?= date('F j, Y, g:i a', strtotime($posts['created_at'])) ?></small>
                                </p>
                            </div>
                            <div class="post-description">
                                <div class="stats">
                                    <?php if (!empty($user->myLike($posts["id"], $user->id))) {
                                    ?>
                                        <a style="color:red" role="button" href="handle_like_profile.php?post_id=<?= $posts["id"] ?>&like=no" class="btn btn-primary btn-lg btn-floating">
                                            <i class="bi bi-heart-fill"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                            </svg>
                                            <span>Like</span>
                                        </a>
                                    <?php
                                    } else {
                                    ?>
                                        <a style="color:darkseagreen" role="button" href="handle_like_profile.php?post_id=<?= $posts["id"] ?>&like=yes" class="btn btn-primary btn-lg btn-floating">
                                            <i class="bi bi-heart"></i>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                            </svg>
                                            <span>Like</span>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="action">
                                    <a role="button" href="All_like.php?post_id=<?= $posts["id"] ?>" class="btn btn-primary btn-lg btn-floating">
                                        <i class="bi bi-clipboard2-pulse-fill"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                                            <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
                                            <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5M9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
                                        </svg>
                                    </a>
                                    <span>Likes</span>
                                </div>
                            </div>
                            <div class="post-footer">
                                <div class="input-group">
                                    <form action="store_comment_home.php" method="post" id="commentForm">
                                        <input class="form-control" name="comment" placeholder="Add a comment" type="text">
                                        <span class="input-group-addon">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </span>
                                        <input type="hidden" name="post_id" value="<?= $posts['id'] ?>">
                                    </form>
                                </div>
                                <ul class="comments-list">
                                    <?php
                                    $comments = $user->get_post_comment($posts["id"]);
                                    foreach ($comments as $comment) {
                                    ?>
                                        <li class="comment">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <p><?= $comment["comment"] ?></p>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <img style="border-radius: 50%;" src="<?= empty($comment['image']) ? 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' : $comment['image']; ?>" alt="avatar" width="25" height="25" />
                                                            <p class="small mb-0 ms-2"><?= $comment["first_name"] . " " . $comment["last_name"] ?></p>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <i class="far fa-thumbs-up mx-2 fa-xs text-body" style="margin-top: -0.16rem;"></i>
                                                            <p class="small text-muted mb-0"><?= $comment["created_at"] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>



        </div>

        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>