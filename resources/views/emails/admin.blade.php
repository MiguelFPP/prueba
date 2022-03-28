<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h1>Registros En El Sistema</h1>
        <h3>
            Hay un nuevo registro en el sistema
        </h3>
        <p>
            El conteo actual de registros por pais es:
        </p>

        <ul>
            @foreach ($persons as $person)
                <li><strong>{{ $person->country }}: </strong> {{ $person->personas }}</li>
            @endforeach
        </ul>

    </div>


</body>

</html>
