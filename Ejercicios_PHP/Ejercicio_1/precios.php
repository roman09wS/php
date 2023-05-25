
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Resultado</title>
</head>
<body style="background: rgb(6,21,98);
                 background: linear-gradient(90deg, rgba(6,21,98,1) 0%, rgba(37,9,121,1) 40%, rgba(0,174,209,1) 100%);margin-top: 50px;">
    <div class = "container">
        <div class="row">
            <div class="col-">
                <div class="p-5 bg-white text-dark text-center">
                    <?php
                        $precio1 = 500000;
                        $precio2 = 750000;
                        $venta = $_REQUEST['venta'];
                        $precioSelect = $_REQUEST['precioSelect'];
                        
                        if ($precioSelect == "precio1") {
                            $result = $precio1*$venta;
                            if ($result > 10000000) {
                                $comision = $result * 0.04;
                                echo "<b>Total a pagar: <b>",($comision+$result),"<br>";
                                echo "<b>Comision del 4%: <b>",$comision;
                            }else if ($result < 10000000) {
                                $comision = $result * 0.01;
                                echo "<b>Total a pagar: ",($comision+$result),"<br>";
                                echo "<b>Comision del 1%: ",$comision;
                            }
                        }else if($precioSelect == "precio2"){
                            $result = $precio2*$venta;
                            if ($result > 10000000) {
                                $comision = $result * 0.10;
                                echo "<b>Total a pagar: <b>",($comision+$result),"<br>";
                                echo "<b>Comision del 10%: <b>",$comision;
                            } else if($result < 10000000){
                                $comision = $result * 0.02;
                                echo "<b>Total a pagar: <b>",($comision+$result),"<br>";
                                echo "<b>Comision del 2%: <b>",$comision;
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>