<?php

class scheduleFunctions{

    public function getTutorials(){
        require '../includes/serverConnection.php';
        $sql = "select * from tutoria";
        $stmt = sqlsrv_query( $conn, $sql );
        return $stmt;
    }

    public function addTutorial($newTutorial){
        require '../includes/serverConnection.php';
        $sql = "insert into tutoria values ('$newTutorial[0]',$newTutorial[1],$newTutorial[2],'$newTutorial[3]','$newTutorial[4]','$newTutorial[5]','$newTutorial[6]','$newTutorial[7]',$newTutorial[8],$newTutorial[9])";
        $stmt = sqlsrv_query( $conn, $sql );
        return $stmt;
    }

    public function addStudentTutorial($id_tuto,$id_usu){
        require '../includes/serverConnection.php';
        $sql = "insert into horario values ($id_usu,$id_tuto)";
        $stmt = sqlsrv_query( $conn, $sql );
        $tot = self:: getPlaces($id_tuto);
        self:: lessPlace($id_tuto,$tot);
        
    }

    public function lessPlace($id_tuto,$new){
        require '../includes/serverConnection.php';
        $sql = "update tutoria set alu_tuto = $new where id_tuto = $id_tuto";
        $stmt = sqlsrv_query( $conn, $sql );
    }



    public function getPlaces($id_tuto){
        require '../includes/serverConnection.php';
        $sql = "select * from tutoria where id_tuto= $id_tuto";
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        return $row['alu_tuto'] - 1;
    }

    public function deleteStudentTutorial($id_hor){
        require '../includes/serverConnection.php';
        $sql = "select * from horario where id_hor =" . $id_hor ;
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        $id_tuto = $row['id_tuto'];
        $sql = "delete from horario where id_hor = $id_hor";
        $stmt = sqlsrv_query( $conn, $sql );
        $sql = "select * from tutoria where id_tuto=".$id_tuto;
        $stmt = sqlsrv_query( $conn, $sql );
        $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        $tot = $row['alu_tuto'] + 1;  
        $sql = "update tutoria set alu_tuto = $tot where id_tuto = $id_tuto" ;
        $stmt = sqlsrv_query( $conn, $sql);
    }
}

?>