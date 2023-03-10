@include('layout.header')
@include('layout.header_menu')
@include('layout.hero')
@include('layout.search')

<main>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if ($listings->count()!=null)

            @foreach ($listings as $listing)

                @include('listings.card')
            @endforeach
        @else
            <p class="text-500 ">No listing</p>
        @endif

    </div>
    <div class="lg:grid  gap-4 mt-4 p-1 space-y-4 md:space-y-0">
        {{$listings->links()}}
    </div>
</main>

@include('layout.footer')