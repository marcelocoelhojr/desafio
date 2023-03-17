<!doctype html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Css/index.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="180x180" href="/Img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/Img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/Img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/Img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/Img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/Img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/Img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>
<style>
    body {
        background-color: #ddd;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark border-bottom bg-dark shadow-sm mb-3">
        <div class="container">
            <a class="navbar-brand" href="/">JobsSilicon</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="jobs" class="nav-link text-white">Vagas</a>
                    </li>
                    <li class="nav-item">
                        <a href="teste" class="nav-link text-white">Candidatos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">Inscrições</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        @yield('content')
        <div style="height: 273px;" class="d-block d-md-none"></div>
        <div style="height: 153px;" class="d-none d-md-block d-lg-none"></div>
        <div style="height: 129px;" class="d-none d-lg-block"></div>
    </main>
    <footer class="border-top fixed-bottom mt-3 text-muted bg-dark">
        <div class="container py-3">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-4 text-center text-md-center text-seconday">
                    &copy; 2023 - JobsSilicon
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</body>

</html>