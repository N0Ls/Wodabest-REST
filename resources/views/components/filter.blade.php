<div class="container">
    <ul class="portfolio-filter">
        <li class="{{ !str_contains(Request::fullUrl(), 'category') ? 'active' : '' }}">
            <a class="{{ !str_contains(Request::fullUrl(), 'category') ? 'active' : '' }}" href="{{ $path }}">Tout</a>
        </li>
        @forelse ($categories as $category)
        <li class="{{ str_contains(Request::fullUrl(), $category->slug) ? 'active' : '' }}">
            <a class="{{ str_contains(Request::fullUrl(), $category->slug) ? 'active' : '' }}"
                href="{{ $path }}?category={{ $category->slug }}">{{ $category->name }}</a>
        </li>
        @empty
        <li>Aucune catégorie à afficher.
        <li>
        @endforelse
    </ul>
</div>