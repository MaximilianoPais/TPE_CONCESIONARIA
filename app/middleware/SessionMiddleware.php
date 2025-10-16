<?php
class SessionMiddleware {

    public function run($request) {
        session_start();

        if (isset($_SESSION['USER_ID'])) {
            $request->user = new stdClass();
            $request->user->id = $_SESSION['USER_ID'];
            $request->user->username = $_SESSION['USER_NAME'];
        } else {
            $request->user = null;
        }

        return $request;
    }
}
