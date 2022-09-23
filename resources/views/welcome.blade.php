<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Scripts -->
        <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

        <!-- Styles -->
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <label>Consulta de referencia (Parte 2)</label>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>Referencia: {{ $info['response']['guias'][0]['dsconsec'] }}</label>
                                </div>
                                <div class="col-xl-6">
                                    <label>Destinatario: {{ $info['response']['guias'][0]['destinatario'] }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>Telefono: {{ $info['response']['guias'][0]['telefono'] }}</label>
                                </div>
                                <div class="col-xl-6">
                                    <label>Direccion: {{ $info['response']['guias'][0]['direccion'] }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>Estado: {{ $info['response']['guias'][0]['estado'] }}</label>
                                </div>
                                <div class="col-xl-6">
                                    <a id="product_name" href="{{ $info['response']['guias'][0]['rutadigitalizada'] }}">Descargar comprobante</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>Origen: {{ $info['response']['guias'][0]['origen'] }}</label>
                                </div>
                                <div class="col-xl-6">
                                    <label>Destino: {{ $info['response']['guias'][0]['destino'] }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>Despacho Referencia: {{ $info['response']['guias'][0]['dsreferencia'] }}</label>
                                </div>
                                <div class="col-xl-6">
                                    <label>Despacho Orden de compra: {{ $info['response']['guias'][0]['dsordencompra'] }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>Agente: {{ $info['response']['guias'][0]['idagente'] }}</label>
                                </div>
                                <div class="col-xl-6">
                                    <label>ID de Empresa: {{ $info['response']['guias'][0]['idempresa'] }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <label>ID Cliente: {{ $info['response']['guias'][0]['idcliente'] }}</label>
                                </div>
                                <div class="col-xl-6">
                                    <label>Fecha de entrega: {{ $info['response']['guias'][0]['dsfechaentrega'] }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <label>Ruta: {{ $info['response']['guias'][0]['rutave'] }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <form method="POST" action="{{ route('search') }}">
                                    @csrf
                                    <label for="ref">Referencia a buscar</label>

                                    <input id="ref"
                                           type="number"
                                           name="ref"
                                           class="@error('ref') is-invalid @else is-valid @enderror">

                                    @error('ref')
                                        <div class="alert alert-danger">"Se requiere solo numeros"</div>
                                    @enderror
                                    <button type="submit">Enviar</button>
                                </form>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">descripcion</th>
                                            <th scope="col">aclaracion</th>
                                            <th scope="col">novedad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histories as $history)
                                            <tr>
                                                <th scope="row">{{$loop->index}}</th>
                                                <td>{{ $history['estado'] }}</td>
                                                <td>{{ $history['fechamostrar'] }}</td>
                                                <td>{{ $history['descripcion'] }}</td>
                                                <td>{{ $history['aclaracion'] }}</td>
                                                <td>{{ $history['novedad'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Creacion de un registro (Parte 3)
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label for="reference">Referencia a insertar</label>
                                    </div>
                                    <div class="col-xl-3">
                                        <input id="reference"
                                               type="number"
                                               name="reference"
                                               class="@error('reference') is-invalid @else is-valid @enderror" value="{{ old('reference') }}">
                                        @error('reference')
                                            <div class="alert alert-danger">"Se requiere solo numeros"</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="product_name">Nombre del producto</label>
                                    </div>
                                    <div class="col-xl-3">
                                        <input id="product_name"
                                               type="text"
                                               name="product_name"
                                               class="@error('product_name') is-invalid @else is-valid @enderror"
                                               value="{{ old('product_name') }}">

                                        @error('product_name')
                                            <div class="alert alert-danger">"Se requiere este campo"</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="observation">Observaciones</label>
                                    </div>
                                    <div class="col-xl-3">
                                        <input id="observation"
                                               type="text"
                                               name="observation"
                                               class="@error('observation') is-invalid @else is-valid @enderror"
                                               value="{{ old('observation') }}">
                                        @error('observation')
                                            <div class="alert alert-danger">"Se requiere este campo y que su extension sea jpg"</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="price">Precio</label>
                                    </div>
                                    <div class="col-xl-3">
                                        <input id="price"
                                               type="text"
                                               name="price"
                                               class="@error('price') is-invalid @else is-valid @enderror"
                                               minlength="1"
                                               maxlength="20"
                                               value="{{ old('price') }}">

                                        @error('price')
                                            <div class="alert alert-danger">"Se requiere este campo y que no se pase de 20 caracteres"</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="amount">Cantidad</label>
                                    </div>
                                    <div class="col-xl-3">
                                        <input id="amount"
                                               type="number"
                                               name="amount"
                                               class="@error('amount') is-invalid @else is-valid @enderror"
                                               minlength="1"
                                               maxlength="4"
                                               value="{{ old('amount') }}">
                                        @error('amount')
                                            <div class="alert alert-danger">"Se requiere este campo y que no se pase de 4 caracteres"</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="taxes">Impuesto</label>
                                    </div>
                                    <div class="col-xl-3">
                                        <input id="taxes"
                                               type="text"
                                               name="taxes"
                                               class="@error('taxes') is-invalid @else is-valid @enderror"
                                               minlength="1"
                                               maxlength="2"
                                               value="{{ old('taxes') }}">

                                        @error('taxes')
                                            <div class="alert alert-danger">"Se requiere este campo y que no se pase de 2 caracteres"</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="state">Estado</label>
                                    </div>
                                    <div class="col-xl-3">
                                        <input id="state"
                                               type="checkbox"
                                               name="state">
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="image">Imagen</label>
                                    </div>
                                    <div class="col-xl-3">
                                        <input id="image"
                                               type="file"
                                               name="image"
                                               class="@error('image') is-invalid @else is-valid @enderror"
                                               value="{{ old('image') }}">

                                        @error('image')
                                            <div class="alert alert-danger">"Se requiere la imagen"</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    </body>
</html>
