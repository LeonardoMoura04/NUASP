<?php
    require_once "config.php";
    
    if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["dividaId"]) && !empty($_GET["dividaId"])){

        $id = $_GET["id"];
        $dividaId = $_GET["dividaId"];
        
        $sql = "UPDATE Parcelas
        SET 
            isPaga = 1
        WHERE
            id = ?;";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: listagemParcelas.php?id=" . $dividaId . "&type=f");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
        
        mysqli_close($link);
    } else{
        header("location: error.php");
        exit();
    }
?>