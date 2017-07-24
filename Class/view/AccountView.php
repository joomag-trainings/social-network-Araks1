<?php include("layouts/header.html"); ?>
    <div id="container">
        <div class="left">
            <form action="index.php?page=account&action=SearchFriends" method="post">
                <input type="text" placeholder="search" name="name">
                <input type="submit" value="Subit" name="search">
            </form>
            <div class="account">

                <a href=""><i class="fa fa-users" aria-hidden="true"></i><span
                            style="color: red"><?= $notification; ?> </span></a>
                <h2>Name Lastname <?php var_dump($_SESSION['id']); ?></h2>
                <img src="images/6-512.png" width="180px" height="180px">

                <div class="info">
                    <span><strong>Email:</strong></span>
                    <span><strong>Gender:</strong>Male</span>
                    <span><strong>Country:</strong></span>my country
                </div>
                <a href="edit.html" class="edit_a edit">Edit<i class="fa fa-pencil-square-o penc"
                                                               aria-hidden="true"></i></a>
            </div>
            <div class="photo">
                <i class="fa fa-camera-retro" aria-hidden="true"></i>
                <a href="index.php?page=upload&action=upload">My photos</a>
            </div>
        </div>
        <div class="post_all">
            <div class="post_div">
                <form>
                    <input type="text" placeholder="Write Your Post" class="post">
                    <button class="post_btn">Post</button>
                </form>

            </div>
            <div class="post_list">
                <img src="images/6-512.png" width="80px" height="80px" class="avatar">
                <span class="nm">Name Lastname</span>
                <p class="post_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="post_list">
                <img src="images/6-512.png" width="80px" height="80px" class="avatar">
                <span class="nm">Name Lastname</span>
                <p class="post_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
        </div>
    </div>
<?php include("layouts/footer.php"); ?>