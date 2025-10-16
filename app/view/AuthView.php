<?php
class AuthView {
    public function mostrarLogin($error = null, $user = null) {
        require './templates/formLogin.phtml';
    }

    public function mostrarLogout($user = null) {
        require './templates/logoutConfirm.phtml';
    }
}

