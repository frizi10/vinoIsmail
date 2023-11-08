// Sélectionner tous les boutons "+ Ajouter"
document.addEventListener('DOMContentLoaded', function() {
    let bouteilleID; 
    const ajouterButtons = document.querySelectorAll('.btn-ajouter');
    
    // Sélectionner la fenêtre modale
    const modal = document.getElementById('modal-ajouter');
    
    // Ajouter un événement d'écouteur de clic à chaque bouton "+ Ajouter"
    ajouterButtons.forEach(function(button) {
        bouteilleID = button.getAttribute('data-bouteille-id'); 
        button.addEventListener('click', function(event) {
            // Empêcher le comportement par défaut du lien (qui est de naviguer vers une nouvelle page)
            event.preventDefault();
    
            // Ouvrir la fenêtre modale
            modal.showModal();
        });
    });
    
    // Sélectionner le bouton "annuler" dans la fenêtre modale
    const closeModalButton = document.querySelector('.btn-modal-cancel');
    
    // Ajouter un événement d'écouteur de clic au bouton "annuler"
    closeModalButton.addEventListener('click', function(event) {
        // Empêcher le comportement par défaut du bouton (qui est de soumettre le formulaire)
        event.preventDefault();
    
        // Fermer la fenêtre modale
        modal.close();
    });
    
    // Fermer la fenêtre modale lorsque l'utilisateur clique en dehors de celle-ci
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.close();
        }
    });

    const form = document.querySelector('#form-ajouter'); 
    const listRadio = document.querySelector('#location-liste'); 
    const cellierRadio = document.querySelector('#location-cellier'); 
    let selectLocation = document.querySelector('#select-location'); 

    listRadio.addEventListener('change', function(evt) {
        selectLocation.innerHTML = ''; 
        loadOptions('liste'); 
    }); 

    cellierRadio.addEventListener('change', function(evt) {
        selectLocation.innerHTML = ''; 
        loadOptions('cellier'); 
    }); 

    async function loadOptions(type) {
        let url;  
        if (type === 'liste') {
            url = '/celliers-json'; 
        }
        else if (type === 'cellier') {
            url = '/celliers-json'; 
        }
        
        try {
            const response = await fetch(url, { 
                method: 'GET',
                headers: {
                    'Content-Type' : 'application/json', 
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
    
            const data = await response.json();
            console.log(data.message); 
            data.forEach(option => {
                let optionElement = document.createElement('option'); 
                optionElement.value = option.id; 
                optionElement.textContent = option.nom; 
                selectLocation.appendChild(optionElement); 
            });
        } 
        catch (error) {
            console.error('Error: ', error); 
        }
    }

    form.addEventListener('submit', function(evt) {
        //WIP
    }); 
})




// CODE POUR CSS DE LA FENETRE MODALE - J'ai essayé plus tôt de mettre un div modal-container pour pouvoir mieux centrer la fenetre modale avec des margins, mais ca ne marchait pas (à réessayer!!!)
// // Sélectionner tous les boutons "+ Ajouter"
// const ajouterButtons = document.querySelectorAll('.btn-ajouter');

// // Sélectionner la fenêtre modale
// const modal = document.getElementById('modal-ajouter');

// // Sélectionner le conteneur de la fenêtre modale
// const modalContainer = document.querySelector('.modal-container');

// // Ajouter un événement d'écouteur de clic à chaque bouton "+ Ajouter"
// ajouterButtons.forEach(function(button) {
//     button.addEventListener('click', function(event) {
//         // Empêcher le comportement par défaut du lien (qui est de naviguer vers une nouvelle page)
//         event.preventDefault();

//         // Ouvrir la fenêtre modale
//         modal.showModal();
//     });
// });

// // Sélectionner le bouton "annuler" dans la fenêtre modale
// const closeModalButton = document.querySelector('.btn-modal-cancel');

// // Ajouter un événement d'écouteur de clic au bouton "annuler"
// closeModalButton.addEventListener('click', function(event) {
//     // Empêcher le comportement par défaut du bouton (qui est de soumettre le formulaire)
//     event.preventDefault();

//     // Fermer la fenêtre modale
//     modal.close();
// });

// // Fermer la fenêtre modale lorsque l'utilisateur clique en dehors de celle-ci
// window.addEventListener('click', function(event) {
//     if (event.target === modalContainer) {
//         modal.close();
//     }
// });
