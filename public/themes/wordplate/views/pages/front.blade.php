@extends('layouts.main')

@section('content')
@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
                
        <kma-slider class="slider-container"></kma-slider>
        @include('partials.buttongallery')
        <main role="main" class="sizable">
            <div class="container">

                <div class="row no-gutters">
                    <div class="col-lg-7">
                        <article class="front">
                            <header>
                                <h1>{{ the_title() }}</h1>
                            </header>
                            
                            {{ the_content() }}

                        </article>
                    </div>
                </div>

            </div>
        </main>

    @endwhile
@else
    @include('pages.404')
@endif
@endsection