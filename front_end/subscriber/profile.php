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
    </style>
</head>

<body>
    <header>

    </header>
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
                                </div>
                                <div class="pull-left meta">
                                    <h6 class="text-muted time"> <span><?= $posts["created_at"] ?></span></h6>
                                </div>
                            </div>
                            <div class="post-image">
                                <?php if (!empty($posts['image'])) : ?>
                                    <img class="card-img-top" src="<?= $posts['image'] ?>" alt="title" style="max-height: 900px; object-fit: contain; width: 100%;" />
                                <?php endif; ?>
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