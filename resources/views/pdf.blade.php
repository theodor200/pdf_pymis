<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exportar a PDF</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-size: 0.9rem;
            font-family: Helvetica, sans-serif;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            width: 190mm;
            min-height: 297mm;
            padding: 0.9cm;
            margin: 0 auto;
            border-radius: 5px;
            background: white;
            line-height: 1.15rem;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        @page {
            size: A4;
            margin: 0;
        }

        .titulo{
            font-size: 1rem;
            line-height: 25px;
            text-align: center;
        }
        .datos_entrega{
            border: solid #000 1px;
            padding: 0.15cm;
            margin-top: 20px;
            font-size: 14px;
        }
        .sub_titulo{
            margin:0 0 15px 0;
            font-size: 14px;
        }

        .img_firma{
            margin-top: 10px;
        }
        .datos_receptor{
            display: inline-block;
            width: 250px;

        }

        .datos_entrega p{
            margin: 0;
            padding: 4px 0;
        }
        .datos_respuesta{
            display: inline-block;
            width: 400px;
            border-bottom: 1px solid #000;
        }
        ul li{
          padding: 2px;
        }
        .pie{
            display: block;
            margin:0 ;
            padding: 8px 0 0 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="book">
        <div class="page">
            <img src="{{asset('img/logotipo.PNG')}}" alt="Logotipo">
            <div>
                <h1 class="titulo">
                    {{ $data->titulo }}
                </h1>
            </div>
            <div>
                 {!! $data->cuerpo !!}
            </div>
            <div class="datos_entrega">
                <h2 class="sub_titulo">Declaro haber recibido un ejemplar del RISSMA de la organización y haber sido capacitado en el mismo: </h2>
                <p><span class="datos_receptor">Apellidos y Nombres :</span> <span class="datos_respuesta">{{$usuario['nombre_apellido']}}</span></p>
                <p><span class="datos_receptor">DNI / CE :</span> <span class="datos_respuesta">{{$usuario['dni']}}</span></p>
                <p><span class="datos_receptor">Código del colaborador :</span><span class="datos_respuesta">{{$usuario['codigo_colaborador']}}</span></p>
                <p><span class="datos_receptor">Puesto del colaborador :</span><span class="datos_respuesta">{{$usuario['puesto_colaborador']}}</span></p>
                <p><span class="datos_receptor">Área del colaborador :</span><span class="datos_respuesta">{{$usuario['area_colaborador']}}</span></p>
                <p><span class="datos_receptor">Fecha de recepción :</span><span class="datos_respuesta">{{$usuario['fecha_recepcion']}}</span></p>
                <p class="firma"><span class="datos_receptor">Firma:</span>
                    @if(isset($usuario['firma']))
                        <img class="img_firma" src= "{{storage_path('app/public/'.$usuario['firma']->getClientOriginalName())}}" width="250" height="70">
                    @else
                        <span class="datos_respuesta">NO SUBIO UNA FIRMA PARA ESTE DOCUMENTO.</span>
                    @endif
                </p>
            </div>
            <span class="pie">{{$data->codigo}}</span>
        </div>

    </div>

</body>
</html>


