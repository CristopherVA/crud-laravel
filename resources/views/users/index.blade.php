<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-ms-8 mx-auto">

                    <div class="card border-0 shadow">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                        - {{ $error }} <br>
                                        @endforeach
                                </div>
                            @endif
                            <form  action="{{ route('users.store'), }}" method="POST">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name')}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email')}}" >
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-auto">
                                        @csrf
                                        <button class="btn btn-primary form-control" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>EMAIL</th>
                                <th>&nbsp;</th>
                            </tr>

                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th>{{ $user->id }}</th>
                                        <th>{{ $user->name }}</th>
                                        <th>{{ $user->email }}</th>
                                        <th >
                                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input 
                                                    class="btn btn-sm btn-danger" 
                                                    type="submit" 
                                                    value="Eliminar"
                                                    onclick="return confirm('Deseas Eliminar...?')"
                                                >
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
