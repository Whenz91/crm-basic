<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6c09380308.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php 
            $page = $_SERVER["PHP_SELF"];
            $pagePices = explode("/", $page);
            $endPageUrlPices = end($pagePices);
            
            switch ($endPageUrlPices) {
                case 'dashbord.php':
                    echo "Főoldal - HannaInstCRM";
                break;
                case 'registration.php':
                    echo "Munkatársak - HannaInstCRM";
                break;
                case 'profil.php':
                    echo "Profilom - HannaInstCRM";
                break;
                default:
                    echo "HannaInstCRM";
                break;
            }
        ?>
    </title>
</head>
<body>