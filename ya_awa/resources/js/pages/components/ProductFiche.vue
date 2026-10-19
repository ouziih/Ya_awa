<script setup>
const props = defineProps({
  product:
  {
    type: Object,
    required: true,
    validator: (value) => {
      return value &&
        typeof value.name === 'string' &&
        typeof value.price === 'number' &&
        typeof value.stock === 'number' &&
        typeof value.categorie_id === 'number' &&
        typeof value.unit === 'string'
    }
  }
})

</script>


<template>
    <main id="main-content" tabindex="-1">
   <div class="container page-space">
    <nav aria-label="Fil d’Ariane" class="breadcrumbs">
     <a href="../index.html">
      Accueil
     </a>
     <svg aria-hidden="true" class="icon" fill="none" height="12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="12">
      <path d="m9 5 7 7-7 7">
      </path>
     </svg>
     <a href="../boutique.html">
      Boutique
     </a>
     <svg aria-hidden="true" class="icon" fill="none" height="12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="12">
      <path d="m9 5 7 7-7 7">
      </path>
     </svg>
     <span aria-current="page">
      Riz brisé parfumé
     </span>
    </nav>
    <!-- DEMANDE 04 — À PROGRAMMER : Lire l’identifiant de route, appeler l’API et gérer les changements d’identifiant, le chargement et les erreurs. -->
    <section class="product-detail" data-component="ProductDetail">
     <div class="detail-image">
      <img :alt="props.product.name" height="520" :src="props.product.image" width="600"/>
     </div>
     <div class="detail-copy">
      <p class="overline">
       Céréales · Vallée du fleuve
      </p>
      <h1>
       {{props.product.name}}
      </h1>
      <p class="muted">
       {{props.product.unit}}
      </p>
      <span class="stock">
       <span aria-hidden="true">
       </span>
       Disponible
      </span>
      <p class="description">
        {{props.product.description}}
      </p>
      <div class="detail-price">
       <strong>
         {{props.product.sale_price === null ? props.product.price : props.product.sale_price}} FCFA
       </strong>
      </div>
      <div class="detail-buy">
       <div class="quantity" data-component="QuantityControl">
        <button aria-label="Diminuer la quantité de Riz brisé parfumé" class="" data-action="diminuer-quantite" type="button">
         −
        </button>
        <input aria-label="Quantité de Riz brisé parfumé" id="detail-1" max="18" min="0" name="quantity" step="1" type="number" value="1"/>
        <button aria-label="Augmenter la quantité de Riz brisé parfumé" class="" data-action="augmenter-quantite" type="button">
         +
        </button>
       </div>
       <button class="btn" data-action="ajouter-panier" type="button">
        <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
         <path d="M6 7h12l2 14H4L6 7Zm3 0V5a3 3 0 0 1 6 0v2">
         </path>
        </svg>
        Ajouter au panier
       </button>
      </div>
      <p class="small muted">
        {{props.product.stock}} unité(s) disponible(s). La quantité sera vérifiée avant confirmation.
      </p>
      <div class="detail-facts">
       <span>
        <svg aria-hidden="true" class="icon" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="18">
         <path d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Zm-5 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0">
         </path>
        </svg>
        Retrait à Castors
       </span>
       <span>
        <svg aria-hidden="true" class="icon" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="18">
         <path d="M2 5h12v12H2V5Zm12 5h4l4 4v3h-8M8 18a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm12 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0">
         </path>
        </svg>
        Livraison par quartier
       </span>
       <span>
        <svg aria-hidden="true" class="icon" fill="none" height="18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="18">
         <path d="m5 12 4 4L19 6">
         </path>
        </svg>
        Paiement à la remise
       </span>
      </div>
      <p class="small muted mt">
       Prix et provenance fictifs pour l’exercice.
      </p>
     </div>
    </section>
    <section class="mt">
     <div class="section-heading">
      <div>
       <p class="overline">
        DANS LE MÊME RAYON
       </p>
       <h2>
        Pour compléter votre marché
       </h2>
      </div>
      <a class="text-button" href="../boutique.html">
       Revenir à la boutique
      </a>
     </div>
     <div class="product-grid">
      <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
      <article class="product-card" data-component="ProductCard" data-product-id="3">
       <div class="product-media">
        <a aria-label="Voir Mil local" href="03-mil.html">
         <img alt="Mil local" height="240" loading="lazy" src="/images/mil.svg" width="360"/>
        </a>
       </div>
       <div class="product-body">
        <p class="overline">
         Kaolack
        </p>
        <h3>
         <a href="03-mil.html">
          Mil local
         </a>
        </h3>
        <p class="muted small">
         kg · 24 disponible(s)
        </p>
        <span class="stock">
         <span aria-hidden="true">
         </span>
         Disponible
        </span>
        <div class="product-bottom">
         <div>
          <strong>
           800 FCFA
          </strong>
         </div>
         <button aria-label="Ajouter Mil local au panier" class="add-button" data-action="ajouter-panier" type="button">
          <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
           <path d="M12 5v14M5 12h14">
           </path>
          </svg>
         </button>
        </div>
       </div>
      </article>
      <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
      <article class="product-card" data-component="ProductCard" data-product-id="4">
       <div class="product-media">
        <a aria-label="Voir Fonio précuit" href="04-fonio.html">
         <img alt="Fonio précuit" height="240" loading="lazy" src="/images/fonio.svg" width="360"/>
        </a>
        <span class="promo-tag">
         Promo −9 %
        </span>
       </div>
       <div class="product-body">
        <p class="overline">
         Kédougou
        </p>
        <h3>
         <a href="04-fonio.html">
          Fonio précuit
         </a>
        </h3>
        <p class="muted small">
         sachet de 500 g · 12 disponible(s)
        </p>
        <span class="stock">
         <span aria-hidden="true">
         </span>
         Disponible
        </span>
        <div class="product-bottom">
         <div>
          <del>
           2 200 FCFA
          </del>
          <strong>
           2 000 FCFA
          </strong>
         </div>
         <button aria-label="Ajouter Fonio précuit au panier" class="add-button" data-action="ajouter-panier" type="button">
          <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
           <path d="M12 5v14M5 12h14">
           </path>
          </svg>
         </button>
        </div>
       </div>
      </article>
      <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
      <article class="product-card" data-component="ProductCard" data-product-id="5">
       <div class="product-media">
        <a aria-label="Voir Maïs en grains" href="05-mais.html">
         <img alt="Maïs en grains" height="240" loading="lazy" src="/images/mais.svg" width="360"/>
        </a>
       </div>
       <div class="product-body">
        <p class="overline">
         Tambacounda
        </p>
        <h3>
         <a href="05-mais.html">
          Maïs en grains
         </a>
        </h3>
        <p class="muted small">
         kg · 30 disponible(s)
        </p>
        <span class="stock">
         <span aria-hidden="true">
         </span>
         Disponible
        </span>
        <div class="product-bottom">
         <div>
          <strong>
           650 FCFA
          </strong>
         </div>
         <button aria-label="Ajouter Maïs en grains au panier" class="add-button" data-action="ajouter-panier" type="button">
          <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
           <path d="M12 5v14M5 12h14">
           </path>
          </svg>
         </button>
        </div>
       </div>
      </article>
     </div>
    </section>
    <p class="template-note">
     <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
      <path d="m8 6-6 6 6 6m8-12 6 6-6 6M14 3l-4 18">
      </path>
     </svg>
     <span>
      Les données sont des exemples fixes. Les actions métier seront programmées par les étudiants.
     </span>
    </p>
   </div>
  </main>
</template>

