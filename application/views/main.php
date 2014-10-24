<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Textbook Exchange</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:800,600,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Gentium+Basic' rel='stylesheet' type='text/css'>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <header>
        <h1>Textbook Exchange</h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Textbooks</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">About</a></li>
        </ul>
        <input type="text" placeholder="Search ISBN, Course, Author...">
        <a href="#"><i class="fa fa-search"></i></a>
    </header>

    <main>
        <section class="getting_started">
            <h1 class="title">Getting Started</h1>
            <ul>
                <li>
                    <i class="fa fa-sign-in"></i>
                    <div>
                        <p class="big_title title">Login</p>
                        <p>Login with Lehigh account</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-search"></i>
                    <div>
                        <p class="big_title title">Search</p>
                        <p>Search for textbooks or courses</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-book"></i>
                    <div>
                        <p class="big_title title">List</p>
                        <p>Create a textbook listing</p>
                    </div>
                </li>
            </ul>
        </section>

        <hr>

        <section class="popular_wrapper">

            <section class="popular_textbooks">
                <h1 class="title">Popular Textbooks</h1>
                <ul>
                    <li>
                        <p class="pop_title">Fundementals of Java</p>
                        <p>CSE 2 &amp; CSE 17</p>
                        <span>Average: $140</span>
                        <span>Amazon: $100</span>
                    </li>
                    <hr class="short">
                    <li>
                        <p class="pop_title">The Theory of Computation</p>
                        <p>CSE 318</p>
                        <span>Average: $190</span>
                        <span>Amazon: $195</span>
                    </li>
                    <hr class="short">
                    <li>
                        <p class="pop_title">Introduction to Economics</p>
                        <p>ECO 1</p>
                        <span>Average: $230</span>
                        <span>Amazon: $250</span>
                    </li>
                    <hr class="short">
                    <li>
                        <p class="pop_title">Ecology: The Study of Nature</p>
                        <p>EES 25</p>
                        <span>Average: $80</span>
                        <span>Amazon: $95</span>
                    </li>
                </ul>
            </section>

            <section class="popular_courses">
                <h1 class="title">Popular Courses</h1>
                <ul>
                    <li>
                        <p>CSE 303: Operating Systems</p>
                        <span>Textbooks: 12</span>
                        <span>Rating: 6.4/10</span>
                    </li>
                    <hr class="short">
                    <li>
                        <p>MATH 23: Calculus III</p>
                        <span>Textbooks: 8</span>
                        <span>Rating: 7.6/10</span>
                    </li>
                    <hr class="short">
                    <li>
                        <p>ECO 1: Introduction to Economics</p>
                        <span>Textbooks: 22</span>
                        <span>Rating: 9.1/10</span>
                    </li>
                    <hr class="short">
                    <li>
                        <p>EES 25: Living Systems</p>
                        <span>Textbooks: 3</span>
                        <span>Rating: 8.3/10</span>
                    </li>
                </ul>
            </section>

        </section>

        <div style="clear: both;"></div>
    </main>

    <footer>
        <p>Copyright &copy; 2014 Matt &amp; Sean. All rights <small>(and wrongs)</small> reserved.</p>
    </footer>
</body>
</html>
