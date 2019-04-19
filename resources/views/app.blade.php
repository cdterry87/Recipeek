<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipeek - Simple recipe management</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
        <div class="container subtitle is-5">
            <div class="navbar-brand">
                <a class="navbar-item" href="#"><span><i class="fas fa-utensils"></i></span> Recipeek</a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarTop">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarTop" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }}</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item"><i class="fas fa-cogs"></i> Settings</a>
                            <hr class="navbar-divider">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="hero is-small">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-quarter">
                        <div class="box">
                            <a class="button is-info is-fullwidth is-medium">
                                <span class="icon">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span>Add Category</span>
                            </a>
                            <hr>
                            <div class="buttons">
                                <a href="" class="button is-fullwidth">
                                    <span class="icon"><i class="fas fa-bacon"></i></span>
                                    <span>Breakfast Recipes</span>
                                </a>
                                <a href="" class="button is-fullwidth">
                                    <span class="icon"><i class="fas fa-hamburger"></i></span>
                                    <span>Dinner Recipes</span>
                                </a>
                                <a href="" class="button is-fullwidth">
                                    <span class="icon"><i class="fas fa-ice-cream"></i></span>
                                    <span>Dessert Recipes</span>
                                </a>
                                <a href="" class="button is-fullwidth">
                                    <span class="icon"><i class="fas fa-cocktail"></i></span>
                                    <span>Drink Recipes</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="column is-three-quarters">
                        <div class="columns">
                            <div class="column is-full">
                                <div class="box">
                                    <div class="field has-addons">
                                        <div class="control has-icons-left is-expanded">
                                            <input type="text" class="input is-medium" placeholder="Search for recipes!">
                                            <span class="icon is-left"><i class="fas fa-search"></i></span>
                                        </div>
                                        <div class="control">
                                            <button class="button is-danger is-medium">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="columns">
                            <div class="column is-one-third">
                                <div class="box has-text-centered">
                                    <h2 class="subtitle is-4"><i class="fas fa-plus"></i> Add Recipe</h2>
                                </div>
                            </div>
                            <div class="column is-one-third">
                                <div class="box has-text-centered">
                                    <h2 class="subtitle is-4">Chicken Tortilla Soup</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="main">
        <div class="container">
            <div class="columns is-multiline">


            </div>
        </div>
    </section>

    <script src="{{ mix('js/bootstrap.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
