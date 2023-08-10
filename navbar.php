<div class="hero-anime">

    <div class="navigation-wrap bg-light start-header start-style" id="">
        <div class="container">
            <nav class="navbarune navbar-expand-md navbar-light">
                <!-- <div class="oh">
                    <a class="navbar-brand" href="https://front.codes/" target="_blank"><img src="house.png" alt=""></a>
                </div> -->
                <div class="topnav" id="myTopnav">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto py-4 py-md-0">
                            <li class="nav-itema pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="navlink" href="biens.php">Acheter</a>
                            </li>
                            <li class="nav-itema pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="navlink" href="biens.php?location=location">Louer</a>
                            </li>
                            <li class="nav-itema pl-4 pl-md-0 ml-0 ml-md-4">
                                <a class="navlink" href="contact.php'">Nous contacter</a>
                            </li>
                            <li class="nav-itema pl-4 pl-md-0 ml-0 ml-md-4">
                            <a class="navlink" href="#"><i class="fa-regular fa-user" style="color: #000000;"></i></a>
                            </li>
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="burgerMenu()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </nav>
        </div>
    </div>

</div>

<script>
    function burgerMenu() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>