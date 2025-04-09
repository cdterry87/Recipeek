<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta
        http-equiv="Content-Type"
        content="text/html; charset=utf-8"
    />
    <title>{{ config('app.name') }} - {{ $recipe->title }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
        }

        .sub-title {
            font-size: 15px;
        }

        .badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .badge {
            font-weight: bold;
            font-size: 10px;
            background-color: #eaeaea;
            padding: 4px;
            margin: 0 2px;
            border: solid 1px #bebebe;
        }

        .section {
            margin-top: 1rem;
        }

        footer {
            position: fixed;
            bottom: -30px;
            left: 0px;
            right: 0px;
            height: 50px;
            font-size: 9px;
            font-weight: bold;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>

<body>
    <h1 class="title">{{ strtoupper($recipe->title) }}</h1>
    <h2 class="sub-title">by {{ ucwords($recipe->user->name) }}</h2>
    <p>{{ $recipe->description }}</p>

    <hr>

    <div class="badges">
        @if ($recipe->category)
            <span class="badge">Category: {{ $recipe->category }}</span>
        @endif
        @if ($recipe->cuisine)
            <span class="badge">Cuisine: {{ $recipe->cuisine }}</span>
        @endif
        @if ($recipe->difficulty)
            <span class="badge">Difficulty: {{ $recipe->difficulty }}</span>
        @endif
        @if ($recipe->method)
            <span class="badge">Method: {{ $recipe->method }}</span>
        @endif
        @if ($recipe->occasion)
            <span class="badge">Occasion: {{ $recipe->occasion }}</span>
        @endif
        <span class="badge">Cook Time: {{ $recipe->getFormattedTime() }}</span>
        @if ($recipe->calories)
            <span class="badge">Calories: {{ $recipe->calories }}</span>
        @endif
        @if ($recipe->servings)
            <span class="badge">Servings: {{ $recipe->servings }}</span>
        @endif
    </div>

    <hr>

    <main>
        <div class="section">
            <h3 class="sub-title">Ingredients</h3>

            <ul>
                @foreach ($recipe->ingredients as $ingredient)
                    <li>
                        <strong>{{ $ingredient->quantity }} {{ $ingredient->unit }}</strong>
                        {{ $ingredient->ingredient }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="section">
            <h3 class="sub-title">Instructions</h3>

            <ol>
                @foreach ($recipe->instructions as $step)
                    <li>{{ $step->instruction }}</li>
                    <hr>
                @endforeach
            </ol>
        </div>

        @if ($recipe->notes)
            <div class="section">
                <h2 class="sub-title">Notes</h2>
                <p>
                    {!! nl2br($recipe->notes) !!}
                </p>
            </div>
        @endif
    </main>

    <footer>
        <p>
            Printed from <strong>&copy;{{ config('app.name') }}</strong> on
            <strong>{{ date('m/d/Y H:i') }}</strong>
        </p>
    </footer>
</body>

</html>
