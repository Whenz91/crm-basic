<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="https://hannainst.hu/image/catalog/hanna-logo-250x80-min.jpeg" width="125" height="40" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashbord.php">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profilom</a>
                </li>
                <?php
                    if($_SESSION['userRank'] == 1) {
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="registration.php">Új munkatárs felvétele</a>
                        </li>
                        ';
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Kilépés</a>
                </li>
            </ul>
        </div>
    </nav>