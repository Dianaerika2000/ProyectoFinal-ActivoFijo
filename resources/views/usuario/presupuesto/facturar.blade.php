<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Facturar Presupuesto</title>
    <link rel="stylesheet" href="{{ asset('UsuarioFacturar/assets/css/main.css') }}">
  
</head>

<body>
    <div class="control-bar">
        <div class="container">
            <div class="row">
                <div class="col-2-4">
                    <div class="slogan">Facturación </div>

                    <label for="config_tax">IVA:
                        <input type="checkbox" id="config_tax" />
                    </label>
                    <label for="config_tax_rate" class="taxrelated">Tasa:
                        <input type="text" id="config_tax_rate" value="13" />%
                    </label>
                    <label for="config_note">Nota:
                        <input type="checkbox" id="config_note" />
                    </label>

                </div>
                <div class="col-4 text-right">
                    <a href="javascript:window.print()">Imprimir</a>
                </div>
                <!--.col-->
            </div>
            <!--.row-->
        </div>
        <!--.container-->
    </div>
    <!--.control-bar-->

    <header class="row">
        <div class="logoholder text-center">
            <img src="{{ asset('UsuarioFacturar/assets/img/logo.png') }}">
        </div>
        <!--.logoholder-->

        <div class="me">
            <p {{-- contenteditable --}}>
                <strong>Sistema Web MarkaBolivia S.A.</strong><br>
                Santa Cruz de la Sierra<br>
                Bolivia.<br>
            </p>
        </div>
        <!--.me-->

        <div class="info">
            <p>
                Web: <a href="http://markabolivia.com">www.markabolivia.com</a><br>
                E-mail: <a href="mailto:franciscolimonrojas@gmail.com">franciscolimonrojas@gmail.com</a><br>
                Tel: +591-73621949<br>
                Facebook: @Francisco Limón Rojas
            </p>
        </div><!-- .info -->

        <div class="bank">
            <p contenteditable>
                Datos bacarios: <br>
                Titular de la cuenta: <br>
                IBAN: <br>
                BIC:
            </p>
        </div>
        <!--.bank-->

    </header>


    <div class="row section">

        <div class="col-2">
            <h1 contenteditable>Factura</h1>
        </div>
        <!--.col-->

        <div class="col-2 text-right details1">
            <p>
                Fecha: <input type="date" class="datePicker" /><br>
                Factura #: <input type="text" value="100" /><br>
                Vence: <input class="twoweeks" type="text" />
            </p>
        </div>
        <!--.col-->

        <div class="col-2  details2">
            <p class="client">
                <b>Facturar a: </b><br>
                Nombre cliente: <input type="text" placeholder="cliente" /><br>
                Razón Social: <input type="text" placeholder="empresa" /><br>
            </p>
        </div>
        <!--.col-->

    </div>
    <!--.row-->

    <div class="row section" style="margin-top:-1rem">
        <div class="col-1">
            <table style='width:100%'>
                <thead {{-- contenteditable --}}>
                    <tr class="invoice_detail">
                        <th width="25%" style="text-align">Vendedor</th>
                        <th width="25%">Orden de compra </th>
                        {{-- <th width="20%">Enviar por</th> --}}
                        <th width="30%">Términos y condiciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="invoice_detail">
                        <td width="25%" style="text-align">{{ Auth::user()->u_nombre }} {{ Auth::user()->u_app }}
                        </td>
                        <td width="25%">PO-{{ $presupuesto->fecha }} </td>
                        {{-- <td width="20%">DHL</td> --}}
                        <td width="25%"><select name="terminos" id="" style="border:none">
                                <option value="1">Pago al contado</option>
                                <option value="2">Pago al credito</option>
                                <option value="3">transferencia bancaria</option>
                            </select></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--.row-->

    <div class="invoicelist-body">
        <table>
            <thead {{-- contenteditable --}}>
                <th width="5%">Código</th>
                <th width="60%">Descripción</th>

                <th width="10%">Cant.</th>
                <th width="15%">Precio</th>
                <th class="taxrelated">IVA</th>
                <th width="10%">Total</th>
            </thead>
            <tbody>
                <tr>
                    <td width='5%'><a class="control removeRow" href="#">x</a> <span >{{ $presupuesto->id }}</span></td>
                    <td width='60%'><span >{{ $presupuesto->nombre }}</span></td>
                    <td class="amount"><input type="text" value="{{ 1 }}" /></td>
                    <td class="rate"><input type="text" value="{{ $presupuesto->montototal }}" /></td>
                    <td class="tax taxrelated"></td>
                    <td class="sum"></td>
                </tr>
            </tbody>
        </table>
        <a class="control newRow" href="#">+ Nueva fila</a>
    </div>
    <!--.invoice-body-->

    <div class="invoicelist-footer">
        <table contenteditable>
            <tr class="taxrelated">
                <td>IVA:</td>
                <td id="total_tax"></td>
            </tr>
            <tr>
                <td><strong>Total:</strong></td>
                <td id="total_price"></td>
            </tr>
        </table>
    </div>

    <div class="note" contenteditable>
        <h2>Nota:</h2>
    </div>
    <!--.note-->

    <footer class="row">
        <div class="col-1 text-center">
            <p class="notaxrelated" contenteditable>El monto de la factura no incluye el impuesto sobre las ventas.
            </p>

        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('UsuarioFacturar/assets/bower_components/jquery/dist/jquery.min.js') }}"><\/script>')
    </script>
    <script src="{{ asset('UsuarioFacturar/assets/js/main.js') }}"></script>
</body>

</html>
