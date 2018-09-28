@extends('layouts.main')

@section('content')
@include('partials.mast')
<main role="main" class="sizable">
    <div class="container">
        @if (have_posts())
            @while (have_posts())
                
                @include('partials.article')

            @endwhile
        @else
            @include('pages.404')
        @endif
    </div>
</main>
@endsection