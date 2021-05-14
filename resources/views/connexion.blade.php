
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    </head>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="{{url('/')}}">Paris Nanterre</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
      </nav>
    </header>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form action="{{ route('connexion') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="inputIdentifiant">Identifiant : </label>
                    <input type="text" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="identifiant">
                  </div><br>

                  <div class="form-group">
                    <label for="inputPassword6">Mot de Passe : </label>
                    <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" name="motDePasse">
                  </div>

                  <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</html>
