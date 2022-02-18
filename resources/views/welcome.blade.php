<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    </head>

    <body class="vh-100" style="box-shadow: inset 5000px 0 rgba(0,0,0,0.22); background-size: cover; background-image: url(https://img3.goodfon.com/original/2590x1600/3/36/gamburger-pomidory-bulki.jpg)">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MY Food</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form action="{{route('homepage')}}" method="get" class="d-flex w-75">
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
                    <p class="text-light">Praduktlari secerek istediyiniz yemeyi elde ede bilersiniz</p>
                    <p>
                        <a href="{{route('homepage')}}" class="btn btn-primary my-2"><i class="bi bi-arrow-clockwise"></i> Yenilə</a>
                        <a href="{{route('homepage')}}" class="btn btn-primary my-2"><i class="bi bi-basket3-fill"></i> Hazırla</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($ingredients as $ingredient)
                        <div class="col-md-2 product{{$ingredient->getAttribute('id')}}">
                            <div class="card">
                                <img src="{{asset(Voyager::image($ingredient->getAttribute('photo')))}}" width="200" height="150" alt="">
                                <div class="card-body">
                                    <div class="list-unstyled d-flex justify-content-center align-items-center">
                                        <p>{{$ingredient->getAttribute('name')}}</p>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group">
                                            <label for="checkbox{{$ingredient->getAttribute('id')}}" data-ingredients='@json($ingredient)' class="btn btn-sm btn-outline-primary m-2 choose label{{$ingredient->getAttribute('id')}}">Seç</label>
                                            <input type="checkbox"  id="checkbox{{$ingredient->getAttribute('id')}}" style="display: none" class="btn btn-sm btn-outline-primary m-2 checkbox{{$ingredient->getAttribute('id')}}">
                                            <button type="button" data-ingredients='@json($ingredient)' class="btn btn-sm btn-outline-danger m-2 delete">Sil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="float-end">
                    {{$ingredients->appends(request()->input())->links()}}
                </div>
            </div>
        </div>
        <section class=" text-center container">
           @foreach($meals as $meal)
                <div class="row mb-2">
                    <h2 class=text-light>Meals</h2>
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="background-color: white">
                            <div class="col p-4 d-flex flex-column position-static">
                                <h3 class="mb-0">{{$meal->getAttribute('name')}}</h3>
                                <p class="card-text mb-auto">{!!$meal->getAttribute('description')!!}</p>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <img src="{{asset(Voyager::image($meal->getAttribute('photo')))}}" alt="" width="300" height="300">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <iframe height="300" src="https://www.youtube.com/embed/_nvOD7_GCls" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    </div>
                    </div>
                </div>
           @endforeach
        </section>
    </main>

    </body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        $('.choose').click(function () {
            let ingredients = $(this).data('ingredients');
            let labelClass = '.label' + ingredients.id

            let checkboxClass = '.checkbox' + ingredients.id

            if ($(checkboxClass).prop('checked')) {
                $(labelClass).html('Seç').css({'background-color': 'white', 'color': 'blue'});
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
