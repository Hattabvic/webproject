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
            <?php
            foreach ($my_posts as $post) {
            ?>
        </div>

        <div class="col-6 offset-3 bg-info mt-5 rounded-2">
            <div class="card shadow-sm">
                <div>
                    </div>
                    <?php
                if (!empty($post['image'])) {
                    ?>
                    <img style="width:50px ; height: 50px;border-radius:50px;" src="<?php if (!empty($user->image)) echo $user->image;
                                                                                    else echo 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' ?>">
                                                                                        <he class="mb-0"><?= $user->first_name ?><?= " " . $user->last_name ?></h6> <br> <span><?= $user->created_at ?></span>
                    <!-- <p><?= $user->first_name . " " . $user->last_name ?></p> -->
                    <img class="card-img-top" src="<?= $post['image'] ?>" />
                <?php
                }
                ?>
                <div class="card-body">
                    <h4 class="card-title"><?= $post['title'] ?></h4>
                    <p class="card-text"><?= $post['content'] ?></p>
                    <p class="card-text">
                        <small class="text-muted">Published on <?= date('F j, Y, g:i a', strtotime($post['created_at'])) ?></small>
                    </p>
                    <!-- <button type="button" class="btn btn-outline-primary btn-sm">
                    <i class="far fa-thumbs-up"></i>like
                </button> -->
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                            <div class="card-body p-4">
                                <form action="store_comment.php" method="post">
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" name="comment" id="addANote" class="form-control" placeholder="Type comment..." />
                                        <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
                                        <button type="submit" class="btn btn-primary mt-3 ms-2">+ Comment</button>
                                    </div>
                                </form>
                                <?php
                                $comments = $user->get_post_comment($post["id"]);
                                foreach ($comments as $comment) {
                                ?>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p><?= $comment["comment"] ?></p>

                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <img style="border-radius: 50%;" src="<?php echo empty($comment['image']) ? 'https://t4.ftcdn.net/jpg/02/34/57/59/240_F_234575931_hDnNJiXNgTzJO4iDDZjhneWKF25o7O2f.jpg' : $comment['image']; ?>" alt="avatar" width="25" height="25" />
                                                    <p class="small mb-0 ms-2"><?= $comment["first_name"] . " " . $comment["last_name"] ?></p>

                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                    <i class="far fa-thumbs-up mx-2 fa-xs text-body" style="margin-top: -0.16rem;"></i>
                                                    <p class="small text-muted mb-0"><?= $comment["created_at"] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php
            }
    ?>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>