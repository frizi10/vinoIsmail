<ul class="pagination" id="custom-pagination">
    @foreach ($elements as $element)
        {{-- Condition pour les liens --}}
        @if (is_string($element))
            <li class="disabled">{{ $element }}</li>
        @endif

        {{-- Condition pour les pages actives --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active">{{ $page }}</li>
                @else
                    <li><a href="{{ $url }}" class="pagination-link" data-page="{{ $page }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
</ul>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction pour charger la page via une requête AJAX
        function loadPage(route) {
            fetch(route)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('app-container').innerHTML = html;
                });
        }

        // Écoutez les changements dans le champ de recherche personnalisée
        document.getElementById('customSearch').addEventListener('input', function() {
            var route = document.getElementById('customSearchForm').getAttribute('action');
            var formData = new FormData(document.getElementById('customSearchForm'));
            var routeWithParams = route + '?' + new URLSearchParams(formData).toString();
            loadPage(routeWithParams);
        });

        // Écoutez les clics sur les liens de pagination
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('pagination-link')) {
                event.preventDefault();
                var route = event.target.getAttribute('href');
                loadPage(route);
            }
        });
    });
</script> --}}
