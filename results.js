document.addEventListener('DOMContentLoaded', function() {
    // Récupère le terme de recherche à partir de l'URL
    var urlParams = new URLSearchParams(window.location.search);
    var searchTerm = urlParams.get('search');
  
    // Simule une requête AJAX pour obtenir la catégorie de produits correspondant au terme de recherche
    // Remplacez ce code avec une vraie logique de recherche ou une requête vers votre API
    setTimeout(function() {
      var category = getCategoryBySearchTerm(searchTerm);
  
      // Affiche la catégorie de produits
      var searchResults = document.getElementById('search-results');
      if (category) {
        searchResults.innerHTML = 'Catégorie de produits : ' + category;
      } else {
        searchResults.innerHTML = 'Aucun résultat trouvé pour "' + searchTerm + '"';
      }
    }, 1000); // Simule un délai d'une seconde pour la requête AJAX
  });
  
  function getCategoryBySearchTerm(searchTerm) {
    // Remplacez cette fonction avec votre logique réelle pour obtenir la catégorie de produits correspondante
    // Vous pouvez utiliser une base de données, une liste de produits prédéfinis, ou tout autre mécanisme de recherche
    // Cet exemple utilise une correspondance de chaîne simple pour les fins de démonstration
    var products = {
        'Tenues de travail': 'Vêtements de travail',
        'Harnais de sécurité': 'Equipements de sécurité',
        'Gants manutention': 'Equipements de protection',
        'Parka': 'Vêtements de travail',
        'Casque de sécurité': 'Equipements de sécurité',
        'Gants chaudronnier': 'Equipements de protection',
        'Chaussures de sécurité': 'Equipements de sécurité'
  };
  
  
    return products[searchTerm.toLowerCase()];
  }
  