<table class="table table-striped">
    <thead>
        <tr>
            @foreach($headers as $header)
                {{-- If header is Body, give it 50% width --}}
                @if(strtolower($header) === 'body')
                    <th style="width:50%">{{ $header }}</th>
                @else
                    <th>{{ $header }}</th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                @foreach($columns as $col)
                    <td 
                        @if(isset($toggleColumn) && $toggleColumn === $col)
                            style="word-break: break-word;"
                        @endif
                    >
                        {{-- Handle clickable link column --}}
                        @if(isset($linkColumn) && $linkColumn === $col)
                            <a href="{{ route($linkRoute, $post->id) }}">
                                {{ data_get($post, $col) }}
                            </a>

                        {{-- Handle toggle column (read more/less) --}}
                        @elseif(isset($toggleColumn) && $toggleColumn === $col)
                            <span class="short-text">{{ Str::limit(data_get($post, $col), 100) }}</span>
                            <span class="full-text d-none">{{ data_get($post, $col) }}</span>
                            <a href="#" class="toggle-link">Read more</a>

                        {{-- Default plain text --}}
                        @else
                            {{ data_get($post, $col) }}
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links('vendor.pagination.bootstrap-5') }}

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const shortText = this.previousElementSibling.previousElementSibling;
            const fullText = this.previousElementSibling;
            if (fullText.classList.contains('d-none')) {
                shortText.classList.add('d-none');
                fullText.classList.remove('d-none');
                this.textContent = 'Read less';
            } else {
                shortText.classList.remove('d-none');
                fullText.classList.add('d-none');
                this.textContent = 'Read more';
            }
        });
    });
});
</script>
