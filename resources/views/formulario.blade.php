@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('documento.update',$data['id'])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h3>Datos del documento.</h3>
            <br>
            <div class="alert alert-dark" role="alert">
                Link publico del documento para generar PDF: <a href="{{route('formulario.generar.publico',$data['id'])}}" target="_blank" class="alert-link">{{route('formulario.generar.publico',$data['id'])}}</a>
            </div>

            <div class="mb-3">
                <label for="validationServer01">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título del documento" required value="{{$data['titulo']}}">
            </div>

            <div class="mb-3">
                <label for="validationTextarea">Cuerpo del documento</label>
                <textarea class="form-control" id="editor" name="editor" rows="120" required>
                {{$data['cuerpo']}}
                </textarea>
            </div>
            <div class="mb-3">
                <label for="validationTextarea">Código o version del documento</label>
                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código del documento" required value="{{$data['codigo']}}">
            </div>

            <br>
            <h3>Datos de la persona que recibirá el documento.</h3>
            <p class="alert alert-dark" role="alert">
                Los datos de usuario que rellene en este formulario no se guardarán en la base de datos. Los datos se mostraran para recrear una previsualización
            del documento PDF.
            </p>
            <br>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Apellidos y nombres:</label>
                    <input type="text" class="form-control" id="nombre_apellido" name="nombre_apellido" placeholder="Ingresa tu nombre y apellido." >

                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">DNI / CE:</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingresar tu DNI o CE." >

                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Código del colaborador:</label>
                    <input type="text" class="form-control" id="codigo_colaborador" name="codigo_colaborador" placeholder="Ingresar tu código del colaborador.">

                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Puesto del colaborador:</label>
                    <input type="text" class="form-control" id="puesto_colaborador" name="puesto_colaborador" placeholder="Ingresar tu código.">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Área del colaborador:</label>
                    <input type="text" class="form-control" id="area_colaborador" name="area_colaborador" placeholder="Ingresar tu área.">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Fecha de recepción:</label>
                    <input type="text" class="form-control datepicker" id="fecha_recepcion" name="fecha_recepcion">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="validationServer01">Subir firma:</label>
                    <input type="file" id="firma" name="firma" class="form-control" accept="image/*">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Actualizar y previsualizar documento</button>
        </form>
    </div>
@endsection
