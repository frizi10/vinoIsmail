document.getElementById('sortCellier').addEventListener('change', function() {
    var sortSelect = document.getElementById('sortCellier'); 
    var selectedSort = sortSelect.options[sortSelect.selectedIndex].value;
    console.log(selectedSort); 

    var currentUrl = window.location.href;
    var newUrl = currentUrl.split('?')[0] + '?sort=' + selectedSort;

    window.location.href = newUrl;
});
