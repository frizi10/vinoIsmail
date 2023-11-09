document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search_users');
    const tableRows = document.querySelectorAll('.user-row');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        tableRows.forEach(function(row) {
            const userName = row.querySelector('.user-name').textContent.toLowerCase();
            const userId = row.querySelector('.user-id').textContent.toLowerCase();

            if (userName.includes(searchTerm) || userId.includes(searchTerm)) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    });
});