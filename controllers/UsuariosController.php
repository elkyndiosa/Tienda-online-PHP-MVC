<?php
require_once 'models/UsuarioModels.php';
class UsuariosController {
    public function index() {
        echo 'Controlador usuarios, action index';
    }
    public function registrar() {
        require_once 'views/usuarios/registrar.php';
    }
    public function save() {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : FALSE;
            $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : FALSE;
            $correo = isset($_POST['correo']) ? $_POST['correo'] : FALSE;
            $contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : FALSE;
            //validamos datos
            $errores = array();
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $nombre_validate = TRUE;
            } else {
                $nombre_validate = FALSE;
                $errores['nombre'] = 'Nombre con datos incorrectos';
            }
            if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {
                $apellido_validate = TRUE;
            } else {
                $apellido_validate = FALSE;
                $errores['apellido'] = 'Apellido con datos incorrectos';
            }
            if (!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $correo_validate = TRUE;
            } else {
                $correo_validate = FALSE;
                $errores['correo'] = 'Correo con datos incorrectos';
            }
//            var_dump($errores);die();
            if (count($errores) == 0) {
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellido($apellido);
                $usuario->setEmail($correo);
                $usuario->setPassword($contraseña);
                $save = $usuario->save();
                if ($save) {
                    $_SESSION['register'] = 'complete';
                } else {
                    $_SESSION['register'] = 'failed';
                }
            } else {
                $_SESSION['errores'] = $errores;
//                S($_SESSION['errores']);die();
            }
        } else {
            $_SESSION['register'] = 'failed';
        }
        header("location: ".base_url."usuarios/registrar");
    }
    public function login() {
        if (isset($_POST)) {
            $usuario = new Usuario;
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity = $usuario->login();
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = TRUE;
                }
            } else {
                $_SESSION['error_login'] = 'identificacion fallida';
            }
        }
        header("location: " . base_url);
    }
    public function logout() {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header("location: " . base_url);
    }
}