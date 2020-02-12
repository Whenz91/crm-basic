<?php
class ErrorHandle {
    /**
     * Hiba üzenetek kezelése
     */
    public function errorLoginCheck($errorMsg) {
            switch ($errorMsg) {
                case "emptyfields":
                    echo '<div class="alert alert-danger" role="alert">Üresen hagytad a mezőket!</div>';
                    break;
                case "wrongpwd":
                    echo '<div class="alert alert-danger" role="alert">Helytelen jelszó!</div>';
                    break;
                case "wrongemail":
                    echo '<div class="alert alert-danger" role="alert">Helytelen email formátum!</div>';
                    break;
                case "nouser":
                    echo '<div class="alert alert-danger" role="alert">Nincs ilyen felhasználó!</div>';
                    break;
                case "nologedin":
                    echo '<div class="alert alert-danger" role="alert">Kérlek jelentkez be!</div>';
                    break;
                case "nomatchpsw":
                    echo '<div class="alert alert-danger" role="alert">Nem egyezik meg a megadott jelszó!</div>';
                    break;
                default:
                    echo '<div class="alert alert-danger" role="alert">Bocsi valami hiba történt a rendszerben!</div>';
                    break;
            }
    }

    /**
     * Rendszer üzenetek kezelése
     */
    public function messageCheck($msg) {
            switch ($msg) {
                case "logedout":
                    echo '<div class="alert alert-info" role="alert">Kijelentkeztél!</div>';
                    break;
                case "regok":
                    echo '<div class="alert alert-success" role="alert">Regisztráció sikeres!</div>';
                    break;
                case "regerror":
                    echo '<div class="alert alert-danger" role="alert">Sikertelen regisztráció!</div>';
                    break;
                default:
                    echo '<div class="alert alert-info" role="alert">Van valamink a számodra!</div>';
                    break;
            }
    }
}