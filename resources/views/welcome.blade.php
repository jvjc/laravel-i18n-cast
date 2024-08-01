<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>i18n demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-3 offset-md-9">
                <form action="{{ route('switch-language') }}" method="POST">
                    @csrf
                    <select class="form-select" name="locale" onchange="this.form.submit()">
                        <option value="en" {{ App::getLocale() == 'en' ? 'selected' : '' }}>English</option>
                        <option value="es" {{ App::getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-12">
                <h1>{{ __('Productos') }}</h1>
                <p>{{ __('Bienvenido a nuestra tienda en línea') }}</p>
                <p class="fw-bold">Acceso a json en <code>/api/en/products</code> y <code>/api/es/products</code></p>
                <table class="table table-responsive table-condensed">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Código') }}</th>
                            <th>Slug</th>
                            <th>{{ __('Nombre') }}</th>
                            <th>{{ __('Descripción') }}</th>
                            <th>{{ __('Precio') }}</th>
                            <th>{{ __('Creado el') }}</th>
                            <th>{{ __('Actualizado el') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>${{ $product->price }} <sup>MXN</sup></td>
                                <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                <td>{{ $product->updated_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
