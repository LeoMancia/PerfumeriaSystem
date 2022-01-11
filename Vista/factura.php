<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/factura.css"> <script src="../js/factura.js"></script> <script src="../js/Carrito.js"></script>
    </head>
    <body>
        <div class="ticket">
            <img
                src="../Img/logomarca.jpg"
                alt="Logotipo">
            <p class="centrado">Magic Essense
                <br>Santa ana
                <br>30/04/2021 08:22 a.m.</p>
            <table>
                <thead>
                    <tr>
                        <th class="cantidad">CANT</th>
                        <th class="producto">PRODUCTO</th>
                        <th class="precio">$$</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cantidad">2</td>
                        <td class="producto">Delicados Petalos 100ML</td>
                        <td class="precio">$20.00</td>
                    </tr>
                    <tr>
                        <td class="cantidad">2</td>
                        <td class="producto">Oscar de la renta tradicional</td>
                        <td class="precio">$14.00</td>
                    </tr>
                    <tr>
                        <td class="cantidad"></td>
                        <td class="producto">TOTAL</td>
                        <td class="precio">$34.00</td>
                    </tr>
                </tbody>
            </table>
            <p class="centrado">¡GRACIAS POR SU COMPRA!
                <br>Magic Essense, Perfumería</p>
        </div>
        <button class="oculto-impresion" onclick="imprimir()">Imprimir</button>
        <a class="btn btn-primary btn-sm oculto-impresion" href="../Vista/adm_catalogo.php" role="button" id="completar-compra">Volver al catálogo</a>
        
    </body>
</html>