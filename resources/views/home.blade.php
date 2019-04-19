@extends('layouts.template')

@section('content')
<section class="hero is-danger is-medium">
    <div class="hero-head">
        <nav class="navbar is-transparent">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item">
                    <i class="fas fa-utensils"></i> Recipeek
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                    <span></span>
                    <span></span>
                    <span></span>
                    </span>
                </div>
                <div id="navbarMenuHeroA" class="navbar-menu">
                    <div class="navbar-end">

                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">Get cookin' with Recipeek!</h1>

            <div>
                <a href="/login" class="button is-link">Get started!</a>
            </div>
        </div>
    </div>
</section>

<section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns">
                <div class="column is-6">
                    <h1 class="title is-4">Keep track of your recipes!</h1>
                    <p>
                        Recipeek helps you keep track of your recipes by giving you a simple way to
                        categorize and list all of your family's favorites!  Say goodbye to pen and paper,
                        and put away your old cookbooks.  Organizing your recipes has never been simpler!
                    </p>
                </div>
                <div class="column is-6">
                    <figure class="image">
                        <img class="is-rounded" src="/images/128.png">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns">
                <div class="column is-6">
                    <figure class="image">
                        <img class="is-rounded" src="/images/128.png">
                    </figure>
                </div>
                <div class="column is-6">
                    <h1 class="title is-4">Take the guess work out of what's for dinner!</h1>
                    <p>
                        Not sure what to make for dinner?  We've got you covered!
                        Recipeek can even suggest new recipes based on your existing recipes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns">
                <div class="column is-6">
                    <h1 class="title is-4">What's for dessert?</h1>
                    <p>
                        Did someone say dessert? Yes, please! Add your own dessert recipes
                        or share with others.  Who says you can't have dessert every night?!
                    </p>
                </div>
                <div class="column is-6">
                    <figure class="image">
                        <img class="is-rounded" src="/images/128.png">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="columns">
                <div class="column is-6">
                    <figure class="image">
                        <img class="is-rounded" src="/images/128.png">
                    </figure>
                </div>
                <div class="column is-6">
                    <h1 class="title is-4">Last call?  We think not!</h1>
                    <p>
                        Keep the drinks flowing by adding your favorite drink recipes.
                        Never forget how to make the perfect drink to entertain your guests!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="content has-text-centered">
        <p>&copy; Recipeek by Chase Terry</p>
    </div>
</footer>
@endsection
