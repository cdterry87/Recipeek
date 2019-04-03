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
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">
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
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link"><i class="fas fa-user-circle"></i>Chase Terry</a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item"><i class="fas fa-cogs"></i> Settings</a>
                            <hr class="navbar-divider">
                            <a class="navbar-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
                    <div class="column is-half is-offset-one-quarter">
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
            </div>
        </div>
    </section>

    <section class="section" id="main">
        <div class="container">
            <div class="columns is-multiline">
                <div class="column is-one-quarter">
                    <div class="box">
                        <a class="button is-info is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span>Create Category</span>
                        </a>
                    </div>
                </div>
                <div class="column is-one-quarter">
                    <div class="box">
                        <h2 class="title is-5 has-text-centered">Category</h2>
                        <a class="button is-danger is-fullwidth">
                            <span class="icon">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span>Add Recipe</span>
                        </a>
                        <hr>
                        <div class="buttons">
                            <button class="button is-fullwidth">
                                My favorite recipe
                            </button>
                            <button class="button is-fullwidth">
                                A really good recipe
                            </button>
                            <button class="button is-fullwidth">
                                Just another recipe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ mix('js/bootstrap.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
