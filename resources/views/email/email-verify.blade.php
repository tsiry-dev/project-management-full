<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

      {{ $user }}

      <h2>Vérification de votre email</h2>
      <p>Votre compte à été créé avec succès😊, vérifiez votre email maintenant!!</p>

      <h2>
        Vérifier mon adresse email
            <strong>
                <a href="http://127.0.0.1:8000/verify/{{ $user->remember_token }}">Vérifier ➡️</a>
            </strong>
      </h2>

</body>
</html>
