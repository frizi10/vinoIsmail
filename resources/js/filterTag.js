// document.addEventListener('DOMContentLoaded', (event) => {
    const selectElements = document.querySelectorAll('details select');
    const tagContainer = document.querySelector('.tag-container');
    const resetButton = document.getElementById('reset-filters');


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

            // Listener pour supprimer le tag
            tag.addEventListener('click', function() {
                // Ajouter l'option de nouveau au select
                const newOption = document.createElement('option');
                newOption.value = this.getAttribute('data-value');
                newOption.text = this.textContent;
                select.appendChild(newOption);

                // Supprimer le tag
                this.remove();
            });

        });
    });

    // Listener pour le bouton reset
    resetButton.addEventListener('click', function() {
        // // Supprimer tous les tags
        // let firstElementChild = tagContainer.firstElementChild;
        // while(firstElementChild) {
        //     // Vérifiez que vous travaillez avec un élément HTML
        //     if (firstElementChild.nodeType === Node.ELEMENT_NODE) {
        //         const tagValue = firstElementChild.getAttribute('data-value');
        //         const tagName = firstElementChild.textContent;
        //         const select = document.querySelector(`select option[value="${tagValue}"]`)?.parentNode || selectElements[0];
        //         const newOption = document.createElement('option');
        //         newOption.value = tagValue;
        //         newOption.text = tagName;
        //         select.appendChild(newOption);
        //         firstElementChild.remove();
        //     }
        //     firstElementChild = tagContainer.firstElementChild;
        // }

        // Récupérer tous les éléments tag dans le tagContainer
        const tags = tagContainer.querySelectorAll('.tag');

        // Supprimer tous les tags et réinsérer les options dans les selects
        tags.forEach(tag => {
            const tagValue = tag.getAttribute('data-value');
            const tagName = tag.textContent;
            
            // Trouver le select associé au tag, ou prendre le premier si non trouvé
            const select = document.querySelector(`select option[value="${tagValue}"]`)?.parentNode || selectElements[0];
            
            // Créer et ajouter l'option au select
            const newOption = document.createElement('option');
            newOption.value = tagValue;
            newOption.text = tagName;
            select.appendChild(newOption);
            
            // Supprimer le tag du DOM
            tag.remove();
        });
    
        // Remettre les select à "Choisir options"
        selectElements.forEach(select => {
            select.selectedIndex = 0;
        });
    })

// });
