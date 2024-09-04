document.addEventListener("DOMContentLoaded", function() {
    // Récupération des elements pour affichage de la modale
    const button = document.getElementById('contact-button');
    const modal = document.querySelector('.modal');
    const close = document.querySelector('.close');

    button.addEventListener('click', function() {
        modal.style.display = "block";
        console.log("Bouton contatc cliqué");
    })

    close.addEventListener('click', function() {
        modal.style.display = "none";
        console.log("La modale se ferme !");
    })

    /*window.onclick = function(event) {
        if (event.target != modal && modal.style.display == "block") {
            modal.style.display = "none";
            console.log("La modale se ferme autrement !");
        }
    }*/
})
