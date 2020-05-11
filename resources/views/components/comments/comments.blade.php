<section class="comments-section">
    <div class="container">
        <div class="row">
            @component('components.comments.addComment', ['image' => $image])@endcomponent
        </div>
        <div class="row">
        @forelse($comments as $comment)
        <div>
            <div>
                <p>{{ $comment->content }}</p>
            </div>
            <div>
                <p>Posté par : {{ $comment->user->name }}</p>
            </div>
        <div>
        @empty
            <p>Aucun commentaire à afficher.</p>
        @endforelse
        </div>
    </div>
</section>