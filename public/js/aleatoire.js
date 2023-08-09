/* Fonction aléatoire. */

function rand(min, max) {
    let decalage = max - min + 1

    let aleatoire = Math.random()
    let entier_aleatoire = Math.floor(aleatoire * decalage)

    return min + entier_aleatoire
}

export default rand