<nav id="the-user-menu" class="main-menu-nav">
    @guest()
        <ul class="menu horizontal align-right">
            <li class="to-left-more">
                <a href="{{route('login')}}" class="menu-single-icon"><i class="fa fa-user"></i></a>
            </li>
        </ul>
    @endguest
    @auth()
        <ul class="menu horizontal align-right">

            <!-- Notifications -->
            <li class="to-left-more">
                <a href="profile-notifications.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-notifications.php" class="menu-single-icon">
                    <i class="fa fa-bell"></i>
                </a>
                <ul class="sub-menu user-notes">

                    <li>
                        <div class="note">
                            <div class="user-message">
                                <img src="assets/placeholder/people/50x50/3.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/3.jpg" class="avatar" alt=""/>
                                <div class="username"><a href="#">Jeff Mitchell</a> on
                                    <a href="#">Chicken Salad with...</a></div>
                                <div class="message">"Elit, sed do eiusmod tempor incididunt..."</div>
                                <div class="date">28 jan 2014</div>
                                <i class="fa fa-comment-o type"></i>
                            </div>
                        </div>
                        <div class="note">
                            <div class="user-message">
                                <img src="assets/placeholder/people/50x50/4.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/4.jpg" class="avatar" alt=""/>
                                <div class="username"><a href="#">Michelle Nelson</a> followed you</div>
                                <div class="date">28 jan 2014</div>
                                <i class="fa fa-check-square-o type"></i>
                            </div>
                        </div>
                        <div class="note">
                            <div class="user-message">
                                <img src="assets/placeholder/people/50x50/5.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/5.jpg" class="avatar" alt=""/>
                                <div class="username"><a href="#">Steven Martinez</a> liked
                                    <a href="#">Spicy Rapid Roast Chicken</a></div>
                                <div class="date">28 jan 2014</div>
                                <i class="fa fa-thumbs-o-up type"></i>
                            </div>
                        </div>
                        <div class="note">
                            <div class="user-message">
                                <img src="assets/placeholder/people/50x50/8.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/8.jpg" class="avatar" alt=""/>
                                <div class="username"><a href="#">Daniel Thompson</a> added to favorites
                                    <a href="#">Creamy Shrimp and Broccoli Fettuccine</a></div>
                                <div class="date">28 jan 2014</div>
                                <i class="fa fa-heart-o type"></i>
                            </div>
                        </div>
                        <div class="note">
                            <div class="user-message">
                                <img src="assets/placeholder/people/50x50/19.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/19.jpg" class="avatar" alt=""/>
                                <div class="username"><a href="#">Maria Bello</a> added
                                    <a href="#">Chicken and Rice Casserole</a> to the collection
                                    <a href="#">Special recipes</a></div>
                                <div class="date">28 jan 2014</div>
                                <i class="fa fa-bookmark-o type"></i>
                            </div>
                        </div>
                    </li>

                    <li class="go-to-all">
                        <a href="profile-notifications.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-notifications.php">View all notifications</a>
                    </li>
                </ul>
            </li>

            <!-- Messages -->
            <li class="to-left-more">
                <a href="profile-private-messages.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-private-messages.php" class="menu-single-icon">
                    <i class="fa fa-envelope"></i>
                    <span class="new-info">2</span>
                </a>
                <ul class="sub-menu user-notes">
                    <li>
                        <div class="note">
                            <a href="#">
                                <div class="user-message">
                                    <img src="assets/placeholder/people/50x50/22.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/22.jpg" class="avatar" alt=""/>
                                    <div class="username">Steven Martinez</div>
                                    <div class="message">"Hello, I need help regarding your recipe..."</div>
                                    <div class="date">5 minutes ago</div>
                                    <i class="fa fa-envelope-o type"></i>
                                </div>
                            </a>
                        </div>
                        <div class="note">
                            <a href="#">
                                <div class="user-message">
                                    <img src="assets/placeholder/people/50x50/21.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/21.jpg" class="avatar" alt=""/>
                                    <div class="username">Michelle Nelson</div>
                                    <div class="message">"Elit, sed do eiusmod tempor incididunt..."</div>
                                    <div class="date">5 days ago</div>
                                    <i class="fa fa-envelope-o type"></i>
                                </div>
                            </a>
                        </div>
                        <div class="note">
                            <a href="#">
                                <div class="user-message">
                                    <img src="assets/placeholder/people/50x50/1.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/1.jpg" class="avatar" alt=""/>
                                    <div class="username">Jeff Mitchell</div>
                                    <div class="message">"Elit, sed do eiusmod tempor incididunt..."</div>
                                    <div class="date">28 jan 2014</div>
                                    <i class="fa fa-envelope-o type"></i>
                                </div>
                            </a>
                        </div>
                        <div class="note">
                            <a href="#">
                                <div class="user-message">
                                    <img src="assets/placeholder/people/50x50/11.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/11.jpg" class="avatar" alt=""/>
                                    <div class="username">Daniel Thompson</div>
                                    <div class="message">"Quis nostrud exercitation ullamco..."</div>
                                    <div class="date">28 jan 2014</div>
                                    <i class="fa fa-envelope-o type"></i>
                                </div>
                            </a>
                        </div>
                    </li>

                    <li class="go-to-all">
                        <a href="profile-private-messages.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-private-messages.php">View all messages</a>
                    </li>
                </ul>
            </li>

            <!-- Submission -->
            <li class="to-left-more">
                <a href="#" class="menu-single-icon"><i class="fa fa-plus"></i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="submit-recipe.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/submit-recipe.php">Submit recipe</a>
                    </li>
                    <li>
                        <a href="submit-request.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/submit-request.php">Request a recipe</a>
                    </li>
                    <li>
                        <a href="submit-forum-topic.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/submit-forum-topic.php">New forums topic</a>
                    </li>
                </ul>
            </li>

            <!-- User menu -->
            <li class="to-left-more">
                <div class="user-details-in-menu">
                    <a href="profile.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile.php" class="avatar"><img src="assets/placeholder/people/50x50/2.jpg" tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/people/50x50/2.jpg" alt=""/></a>
                </div>
                <ul class="sub-menu">
                    <li>
                        <a href="profile.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile.php">Public Profile</a>
                    </li>
                    <li class="separator">
                        <a href="profile-requests.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-requests.php">Requests</a>
                    </li>
                    <li>
                        <a href="profile-collections.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-collections.php">Collections</a>
                    </li>
                    <li>
                        <a href="profile-favorites.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-favorites.php">Favorites</a>
                    </li>
                    <li class="separator">
                        <a href="profile-likes.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-likes.php">Likes</a>
                    </li>
                    <li>
                        <a href="profile-reputation.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-reputation.php">Reputation</a>
                    </li>
                    <li class="separator">
                        <a href="profile-followers.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-followers.php">Followers</a>
                    </li>
                    <li>
                        <a href="profile-notifications.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-notifications.php">Notifications</a>
                    </li>
                    <li>
                        <a href="profile-private-messages.php.htm" tppabs="http://smartik.ws/demo/themeforest/html/gustos/profile-private-messages.php">Private Messages</a>
                    </li>
                    <li class="separator"><a href="#">Settings</a></li>
                    <li><a href="#">Sign Out</a></li>
                </ul>
            </li>
        </ul>
    @endauth
</nav>
