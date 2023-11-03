document.addEventListener('DOMContentLoaded', (event) => {
    const selectElements = document.querySelectorAll('select');
    const tagContainer = document.querySelector('.tag-container');

    selectElements.forEach(select => {
        select.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const value = selectedOption.value;
            const text = selectedOption.text;

            // Créer un nouveau tag
            const tag = document.createElement('div');
            tag.classList.add('tag');
            tag.textContent = text;
            tag.setAttribute('data-value', value);

            // Ajouter le tag au conteneur
            tagContainer.appendChild(tag);

            // Retirer l'option du select
            selectedOption.remove();

            // Événement pour supprimer le tag
            tag.addEventListener('click', function() {
                // Ajouter l'option de nouveau au select
                const newOption = document.createElement('option');
                newOption.value = this.getAttribute('data-value');
                newOption.text = this.textContent;
                select.appendChild(newOption);

                // Supprimer le tag du DOM
                this.remove();
            });
        });
    });
});
