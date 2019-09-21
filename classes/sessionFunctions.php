<?php

class sessionFunctions{

    public function createSession($user){
        $_SESSION['id_usu'] = $user[0];
        $_SESSION['id_rol'] = $user[1];
        self:: verifyRolSession();
    }

    public function verifyActiveSession(){
        if (isset($_SESSION['id_usu'])) {
            self:: verifyRolSession();
        }
    }

    public function verifyRolSession(){
        if ($_SESSION['id_rol'] == 1){
            header('Location: /tutoriasWeb/views/adminMain.php');
        }else if ($_SESSION['id_rol'] == 2){
            header('Location: /tutoriasWeb/views/teacherMain.php');
        }else if ($_SESSION['id_rol'] == 3){
            header('Location: /tutoriasWeb/views/information.php');
        }
    }

    public function verifyStudent(){
        if (isset($_SESSION['id_usu'])) {
            if ($_SESSION['id_rol'] != 3) {
                if ($_SESSION['id_rol'] == 1) {
                    header('Location: /tutoriasWeb/views/adminMain.php');
                }else if ($_SESSION['id_rol'] == 2) {
                    header('Location: /tutoriasWeb/views/teacherMain.php');
                }
            }
        }else{
            header('Location: /tutoriasWeb/index.php');
        }
    }

    public function verifyTeacher(){
        if (isset($_SESSION['id_usu'])) {
            if ($_SESSION['id_rol'] != 2) {
                if ($_SESSION['id_rol'] == 1) {
                    header('Location: /tutoriasWeb/views/adminMain.php');
                }else if ($_SESSION['id_rol'] == 3) {
                    header('Location: /tutoriasWeb/views/information.php');
                }
            }
        }else{
            header('Location: /tutoriasWeb/index.php');
        }
    }

    public function verifyAdmin(){
        if (isset($_SESSION['id_usu'])) {
            if ($_SESSION['id_rol'] != 1) {
                if ($_SESSION['id_rol'] == 2) {
                    header('Location: /tutoriasWeb/views/teacherMain.php');
                }else if ($_SESSION['id_rol'] == 3) {
                    header('Location: /tutoriasWeb/views/information.php');
                }
            }
        }else{
            header('Location: /tutoriasWeb/index.php');
        }
    }

    public function destroySession(){
        session_unset();
        session_destroy();
        header('Location: /tutoriasWeb/index.php');
    }
}

?>