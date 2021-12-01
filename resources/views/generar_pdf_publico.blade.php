@extends('layouts.app_public')

@section('content_public')
    <div class="container">
        <form action="{{route('documento.generar.pdf.publico',$data['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <h2>{{$data['titulo']}}</h2>
            </div>
            <div class="mb-3">
                {!! $data['cuerpo'] !!}
            </div>

            <br>
            <h3>Datos de la persona que recibirá el documento.</h3>
            <p class="alert alert-dark" role="alert">
                Estos datos se alamcenarán para una posterior revisión del administrador. <br>
                Por favor verifique su información antes de generar el documento en formato PDF.
            </p>
            <br>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Apellidos y nombres:</label>
                    <input type="text" class="form-control" id="nombre_apellido" name="nombre_apellido" placeholder="Ingresa tu nombre y apellido." required>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">DNI / CE:</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingresar tu DNI o CE." required>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Código del colaborador:</label>
                    <input type="text" class="form-control" id="codigo_colaborador" name="codigo_colaborador" placeholder="Ingresar tu código del colaborador." required>

                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Puesto del colaborador:</label>
                    <input type="text" class="form-control" id="puesto_colaborador" name="puesto_colaborador" placeholder="Ingresar tu código." required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Área del colaborador:</label>
                    <input type="text" class="form-control" id="area_colaborador" name="area_colaborador" placeholder="Ingresar tu área." required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Fecha de recepción:</label>
                    <input type="text" class="form-control datepicker" id="fecha_recepcion" name="fecha_recepcion" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Subir firma:</label>
                    <input type="file" id="firma" name="firma" class="form-control" accept="image/*" required>
                </div>
            </div>

            <div class="mb-3">
                <p>{{$data['codigo']}}</p>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Generar PDF</button>
        </form>
    </div>
@endsection
