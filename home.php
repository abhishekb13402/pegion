<?php
    // if(isset($_SESSION['user-id']) == false)
    //     header('Location: login.php');

    require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/common.css" />
    <link rel="stylesheet" href="assets/css/home.css" />
</head>

<body>
    <div class="container">
        <div class="grid">
            <nav id="sidebar">
                <div class="upper">
                    <div class="logo">
                        <img src="assets/logo.png" alt="">
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="">
                                <span class="material-symbols-outlined icon">home</span>
                                <span class="option">Home</span>
                                <nn
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="material-icons icon">tag</span>
                                <span class="option">Explore</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="material-symbols-outlined icon">notifications</span>
                                <span class="option">Notification</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="material-icons icon">mail_outline</span>
                                <span class="option">Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="material-icons icon">bookmark_border</span>
                                <span class="option">Bookmarks</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="material-icons icon">list_alt</span>
                                <span class="option">List</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="material-icons icon">perm_identity</span>
                                <span class="option">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="material-icons icon">more_horiz</span>
                                <span class="option">More</span>
                            </a>
                        </li>
                    </ul>
                    <a class="coo-btn" href="#">Coo</a>
                </div>

                <div class="lower">
                    <div class="profile_icon">
                        <img src="assets/icon/user.png" alt="">
                    </div>
                    <div>
                        <span class="name">Pegion</span>
                        <span class="user_name">@Pegion_msg</span>
                    </div>
                    <span class="material-icons icon">more_horiz</span>
                </div>
            </nav>

            <main class="feed">
                <div class="feed-header">
                    <div class="home">
                        <h3>Home</h3>
                    </div>
                    <div class="cho-box">
                        <div class="p1">
                            <div class="profile_icon"><img src="assets/icon/user.png" alt=""></div>
                            <input type="text" name="" placeholder="What's happening?" />
                        </div>
                        <div class="p2">
                            <div>
                                <span class="material-symbols-outlined">sentiment_satisfied</span>
                                <img src="assets/icon/gallery.png" alt="">
                                <img src="assets/icon/gif.png" alt="">
                                <img src="assets/icon/timetable.png" alt="">
                                <img src="assets/icon/location.png" alt="">
                            </div>
                            <input class="coo-btn" type="submit" value="Cho">
                        </div>
                    </div>
                </div>

                <div class="coo_wrapper">
                    <?php
                        $query ="SELECT * FROM coos";
                        $result = mysqli_query($connection, $query);

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="coo">
                            <div class="user_icon">
                                <img src="assets/icon/user.png" alt="">
                            </div>
                            <div class="post_details">
                                <div class="user_info">
                                    <?php
                                        $userId = $row['user_id'];
                                        $q = "SELECT * FROM user WHERE u_id = $userId";
                                        $r = mysqli_query($connection, $q);
                                        $userInfo = mysqli_fetch_assoc($r);
                                    ?>
                                    <span class="full_name"><?php echo $userInfo['full_name']; ?></span>
                                    <span class="user_name"><?php echo $userInfo['user_name']; ?></span>
                                </div>
                                <div class="discription"><?php echo $row['discription']; ?></div>
                                <div class="post_img">
                                    <img src="<?php echo $row['img_url']; ?>" alt="">
                                </div>
                                <div class="post_actions"></div>
                            </div>
                        </div>
                    <?php
                            }
                        }else{
                            echo "No Post Found";
                        }
                    ?>
                </div>
            </main>

            <aside></aside>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>