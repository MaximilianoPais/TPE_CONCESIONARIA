<?php
class GuardMiddleware {

    public function run($request) {
        if (!$request->user) {
            header("Location: " . BASE_URL . "login");
            exit();
        }
        return $request;
    }
}
