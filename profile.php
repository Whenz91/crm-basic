<?php
include "view/header.php";
?>

    <?php include "view/nav.php"; ?>

    <main class="container mt-3">
        <div class="container" id="messageBox"></div>
        
        <form method="POST" id="profileForm">
            <input type="text" class="d-none" id="hiddenId" value="<?php echo $_SESSION["userId"] ?>">
            <input type="text" class="d-none" id="hiddenRank" value="<?php echo $_SESSION["userRank"] ?>">
            <div class="form-group">
                <label for="name">Teljes név</label>
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="form-group">
                <label for="email">Email cím</label>
                <input type="email" class="form-control" id="email" name="email" value="">
            </div>
            <div class="form-group">
                <label for="phone">Telefonszám</label>
                <input type="text" class="form-control" id="phone" name="phone" value="">
            </div>
            <div class="form-group">
                <label for="location">Város</label>
                <input type="text" class="form-control" id="location" name="location" value="">
            </div>
            <div class="form-group">
                <label for="password">Jelszó</label>
                <input type="password" class="form-control" id="password" name="password" value="">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" id="showPass" aria-label="Checkbox for following text input"> &nbsp; Jelszó mutatása
                    </div>
                </div>
            </div>
        </form>
        <button type="button" id="update" class="btn btn-primary">Adatok módosítása</button>

    </main>

<?php include "view/footer.php"; ?>