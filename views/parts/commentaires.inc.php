<section class="commentaires">
    <div class="conteneur_titre">
        <h2>les commentaires clients</h2>
        <hr>
    </div>

    <article class="un_commentaire" v-for="(commentaire, index) of commentaires">

        <div class="etoiles">
            <img v-for="i of Math.floor(commentaire.note)" class="etoile" src="public/img/etoile.svg" alt="etoile" style="max-height: 50px">
            <img v-if="!demiEtoile(commentaire.note)" class="etoile" src="public/img/demi-etoile.svg" alt="etoile" style="max-height: 50px">
        </div>

        <p>{{ commentaire.texte }}</p>

    </article>
</section>