// Sélectionner tous les boutons "+ Ajouter"
const ajouterButtons = document.querySelectorAll('.btn-ajouter');

// Sélectionner la fenêtre modale
const modal = document.getElementById('modal-ajouter');

// Ajouter un événement d'écouteur de clic à chaque bouton "+ Ajouter"
ajouterButtons.forEach(function(button) {
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
