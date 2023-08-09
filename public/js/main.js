import { createApp, ref } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
import rand from "./aleatoire.js"

// -- La liste des commentaires
const commentaires = ref([])
// -- La division de la section du menu entrée
const menu_entree = ref(false)
// -- La division de la section du menu repas
const menu_repas = ref(false)
// -- La division de la section du menu dessert
const menu_dessert = ref(false)
// -- La division de la section modification de l'utilisateur
const utilisateur = ref(false)
// -- La division de la section modification des catégories
const categorie = ref(false)

// Récupération des informations du fichier json
fetch("public/data/commentaires.json").then(resp => resp.json()).then(contenu => {
    
    // choisir deux commentaires au hasard
    const commentairesaleatoire = []

    // Aléatoire sur les deux commentaires
    // S'assurer que le même commentaire n'est pas prit deux fois
    while (commentairesaleatoire.length < 2) {
        const index = rand(0, contenu.length - 1)
        if (!commentairesaleatoire.includes(index)) {
        commentairesaleatoire.push(index)
        }
    }

    // retour d'un nouveau tableau avec les informations des deux commentaires
    commentaires.value = commentairesaleatoire.map((index) => contenu[index])

    // Fonction pour si la note dans le fichier json est entier ou non. Permet d'ajouter une demi-étoile
    function demiEtoile(commentaire_note) {
        return Number.isInteger(commentaire_note);
    }

    // Les fonctions pour ouvrir ou fermer certaines sections de la page d'administration
    function btCliqueCategorie() {
        categorie.value = !categorie.value   
    }
    function btCliqueUtilisateur() {
        utilisateur.value = !utilisateur.value   
    }
    function btCliqueEntree() {
        menu_entree.value = !menu_entree.value   
    }
    function btCliqueRepas() {
        menu_repas.value = !menu_repas.value   
    }
    function btCliqueDessert() {
        menu_dessert.value = !menu_dessert.value   
    }

    const root = {
        setup() {
            return {
                // propriétés
                commentaires,
                menu_entree,
                menu_repas,
                menu_dessert,
                utilisateur,
                categorie,
                // fonction
                demiEtoile,
                btCliqueEntree,
                btCliqueRepas,
                btCliqueDessert,
                btCliqueUtilisateur,
                btCliqueCategorie,
            }
        }
    }

    createApp(root).mount("#app")

})
