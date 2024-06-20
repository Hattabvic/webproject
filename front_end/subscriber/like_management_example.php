 <?php

// استدعاء الكلاسات وملف التكوين
// require_once('configration.php');
// require_once('User.php');

// $currentUserId = 1;

// $user = User::login('user@email.com', 'password');

// if ($user) {
//     if ($user->get_like_status($postId, $currentUserId)) {
//         $user->remove_like($postId, $currentUserId);
//     } else {
//         $user->add_like($postId, $currentUserId);
//     }
// }

?>
<!--<button id="likeBtn" onclick="toggleLike()">Like</button>
<script>
    function toggleLike() {
        var userId = <?php echo $currentUserId; ?>;
        var postId = <?php echo $postId; ?>;

        fetch('toggle_like.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    postId: postId,
                    userId: userId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.liked) {
                    document.getElementById('likeBtn').innerText = 'Unlike';
                } else {
                    document.getElementById('likeBtn').innerText = 'Like';
                }
            })
            .catch(error => console.error('Error toggling like:', error));
    }
</script> -->