<?php

class userFunctions{

    public function logIn($boleta,$password){
        require 'includes/serverConnection.php';
        $sql = "select * from usuario where bol_usu = '$boleta' AND con_usu ='$password'";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        $user = array($row['id_usu'],$row['id_rol']);
        return $user;
    }

    public function logInTeacher($noEmp,$password){
        require 'includes/serverConnection.php';
        $sql = "select * from profesor where noemp_prof = '$noEmp' AND con_prof ='$password'";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        $userT = array($row['id_prof'],$row['id_rol']);
        return $userT;
    }

    public function logInFromSignUp($username,$password){
        require '../includes/serverConnection.php';
        $sql = "select * from usuario where cor_usu = '$username' AND con_usu ='$password'";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        $user = array($row['id_usu'],$row['id_rol']);
        return $user;
    }

    public function signUp($newUser){
        require '../includes/serverConnection.php';
        $sql = "insert into usuario values ('$newUser[0]','$newUser[1]','$newUser[2]','$newUser[3]','$newUser[4]',$newUser[5],$newUser[6],'$newUser[7]','$newUser[8]',3,'sin imagen')";
        $stmt = sqlsrv_query( $conn, $sql );
    }

    public function updateStudent($updatedAdmin){
        require '../includes/serverConnection.php';
        $sql = "update usuario set nom_usu= '$updatedAdmin[0]', cas_usu= '$updatedAdmin[1]', tel_usu='$updatedAdmin[2]', id_sex=$updatedAdmin[3],cor_usu='$updatedAdmin[4]',con_usu='$updatedAdmin[5]',gru_usu='$updatedAdmin[6]' where id_usu = $updatedAdmin[7]";
        
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        
    }

    public function updateTeacher($updatedAdmin){
        require '../includes/serverConnection.php';
        $sql = "update profesor set nom_prof= '$updatedAdmin[0]', cor_prof= '$updatedAdmin[1]', con_prof='$updatedAdmin[2]', id_sex=$updatedAdmin[3],cas_prof='$updatedAdmin[4]',cel_prof='$updatedAdmin[5]' where id_prof = $updatedAdmin[6]";
        
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        
    }

    public function updateAdmin($updatedAdmin){
        
        require '../includes/serverConnection.php';
        $sql = "update usuario set nom_usu= '$updatedAdmin[0]', cas_usu= '$updatedAdmin[1]', tel_usu='$updatedAdmin[2]', id_sex=$updatedAdmin[3],cor_usu='$updatedAdmin[4]',con_usu='$updatedAdmin[5]' where id_rol = 1";
        
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        
    }

    public function deleteStudent($newUser){
        require 'includes/serverConnection.php';
        $sql = "";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        $user = self:: login($newUser['']);
    }

    public function deleteTeacher($newUser){
        require 'includes/serverConnection.php';
        $sql = "";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        $user = self:: login($newUser['']);
    }

    public function verifyExistence($boleta){
        require '../includes/serverConnection.php';
        $sql = "select count(*) as total from existence where bol_ext=$boleta";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        return $row['total'];
    }

    public function verifyNoExistence($boleta){
        require '../includes/serverConnection.php';
        $sql = "select count(*) as total from usuario where bol_usu=$boleta";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        return $row['total'];
    }

    public function insertTeacher($newTeacher){
        require '../includes/serverConnection.php';
        $sql = "insert into profesor values ($newTeacher[0],'$newTeacher[1]','$newTeacher[2]','$newTeacher[3]',$newTeacher[4],'$newTeacher[5]','$newTeacher[6]',2)";
        $stmt = sqlsrv_query( $conn, $sql );
    }
}

?>
