<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Food - Meals</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body class="vh-100" style="box-shadow: inset 5000px 0 rgba(0,0,0,0.22); background-size: cover; background-image: url(https://img3.goodfon.com/original/2590x1600/3/36/gamburger-pomidory-bulki.jpg)">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link active btn px-4" style="background-color: #65d765" aria-current="page" href="{{route('homepage')}}">MyFood</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link btn px-4" style="background-color: #65d765" href="{{route('meals')}}">Meals</a>
                </li>
            </ul>

            <form action="{{route('meals')}}" method="get" class="d-flex w-75">
                <input class="form-control me-2" name="search" value="{{request('search')}}" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

        </div>
    </div>
</nav>
<main>

    <section class=" text-center container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto" >
                <h1 class="text-light">My Food</h1>
            </div>
        </div>
    </section>

    <section class=" text-center container">
        @foreach($meals as $meal)
            <div class="row mb-2">
                <h2 class=text-light></h2>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden d-flex justify-content-center" style="background-color: white">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{$meal->getAttribute('name')}}</h3>
                            <p class="card-text mb-auto">{!!$meal->getAttribute('description')!!}</p>
                        </div>
                        <div class="col-auto d-lg-block">
                            <img src="{{asset(\TCG\Voyager\Facades\Voyager::image($meal->getAttribute('photo')))}}" alt="" width="300" height="300">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <iframe height="300" src="https://www.youtube.com/embed//{{$meal->getAttribute('url')}}" ></iframe></div>
                </div>
            </div>
        @endforeach
            <div class="float-end">
                {{$meals->appends(request()->input())->links()}}
            </div>
    </section>
</main>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        $('.choose').click(function () {
            let ingredients = $(this).data('ingredients');
            let id = ingredients.id;

            let labelClass = '.label' + id
            let checkboxClass = '.checkbox' + ingredients.id

            if ($(checkboxClass).prop('checked')) {
                $(labelClass).html('Choose').css({'background-color': 'white', 'color': 'blue'});
            } else {
                $(labelClass).html('<i class="bi bi-bookmark-check"></i>').css({
                    'background-color': 'green',
                    'color': 'white'
                });
            }
        })


        $('.delete').click(function () {
            let ingredients = $(this).data('ingredients');
            let className = '.product' + ingredients.id
            $(className).hide();
        })

    })
</script>
