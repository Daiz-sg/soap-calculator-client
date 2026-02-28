<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacion = $_POST['operacion'];

    // URL del servicio SOAP
    $location = "http://localhost:8080/Calculadora/WSCalculadora?wsdl";

    // Construcción de la solicitud SOAP en función de la operación
    $request = "
        <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:ws='http://ws.proyecto.empresa.com/'>
            <soapenv:Header/>
            <soapenv:Body>
                <ws:$operacion>
                    <num1>$num1</num1>
                    <num2>$num2</num2>
                </ws:$operacion>
            </soapenv:Body>
        </soapenv:Envelope>
    ";

    $headers = [
        'Method: POST',
        'Connection: Keep-Alive',
        'User-Agent: Apache-HttpClient/4.5.5 (Java/16.0.1)',
        'Content-Type: text/xml;charset=UTF-8',
        'SOAPAction: ""',
    ];

    $ch = curl_init($location);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

    $response = curl_exec($ch);
    curl_close($ch);

    echo "<div class='result'>";
    echo "<h4>Resultado:</h4>";
    echo "<pre>".$response."</pre>";
    echo "</div>";
}
?>

<!-- Formulario HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Calculadora SOAP</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora SOAP</h1>
        <br>
        <form method="POST" action="">
            <div class="form-group">
                <label>Número 1:</label>
                <input type="text" name="num1" required>
            </div>
            <div class="form-group">
                <label>Número 2:</label>
                <input type="text" name="num2" required>
            </div>
            <br>
            <div class="operation">
                <label><input type="radio" name="operacion" value="Suma" checked> Suma</label>
                <label><input type="radio" name="operacion" value="Resta"> Resta</label>
                <label><input type="radio" name="operacion" value="Multiplicacion"> Multiplicación</label>
                <label><input type="radio" name="operacion" value="Division"> División</label>
            </div> <br>
            <input type="submit" value="Calcular">
        </form>
    </div>
</body>
</html>
