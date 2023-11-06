document.getElementById('sortCellier').addEventListener('submit', function(event) {
    event.preventDefault();

    var sortSelect = document.getElementById('sort');
    var selectedSort = sortSelect.options[sortSelect.selectedIndex].value;

    var currentUrl = window.location.href;
    var newUrl = currentUrl.split('?')[0] + '?sort=' + selectedSort;

    window.location.href = newUrl;
});
