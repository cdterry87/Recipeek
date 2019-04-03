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
    <section class="hero is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title has-text-centered">Recipeek</h1>
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

    <div id="main" class="container">
        <div class="columns">
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
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/bootstrap.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
