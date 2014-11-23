(function() {

    var dndHandler = {
 		draggedElement: null, // Propriété pointant vers l'élément en cours de déplacement

    applyDragEvents: function(element) {
	        
        element.draggable = true;

        var dndHandler = this; // Cette variable est nécessaire pour que l'événement « dragstart » accède facilement au namespace « dndHandler »

        element.addEventListener('dragstart', function(e) {
            dndHandler.draggedElement = e.target; // On sauvegarde l'élément en cours de déplacement
            e.dataTransfer.setData('text/plain', ''); // Nécessaire pour Firefox
        }, false);
        
    }

    applyDropEvents: function(dropper) {
        
        dropper.addEventListener('dragover', function(e) {
            e.preventDefault(); // On autorise le drop d'éléments
            this.className = 'dropper drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
        }, false);
        
        dropper.addEventListener('dragleave', function() {
            this.className = 'dropper'; // On revient au style de base lorsque l'élément quitte la zone de drop
        });
        
    }

    dropper.addEventListener('drop', function(e) {

    var target = e.target,
        draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
        clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
    
    target.className = 'dropper'; // Application du style par défaut
    
    clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
    dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()
      
	});
    };


    (function() {

    var dndHandler = {

        // […]

    };

    var elements = document.querySelectorAll('.draggable'),
        elementsLen = elements.length;

    for(var i = 0 ; i < elementsLen ; i++) {
        dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
    }

    var droppers = document.querySelectorAll('.dropper'),
        droppersLen = droppers.length;

    for(var i = 0 ; i < droppersLen ; i++) {
        dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
    }

})();