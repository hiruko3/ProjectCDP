
    var dndHandler = {
        
        draggedElement: null, // Propriété pointant vers l'élément en cours de déplacement
        
        applyDragEvents: function(element) {
            
            element.draggable = true;

            var dndHandler = this; // Cette variable est nécessaire pour que l'événement « dragstart » ci-dessous accède facilement au namespace « dndHandler »
            
            element.addEventListener('dragstart', function(e) {
                dndHandler.draggedElement = e.target; // On sauvegarde l'élément en cours de déplacement
                e.dataTransfer.setData('text/plain', ''); // Nécessaire pour Firefox
            }, false);
            
        },
 
        applyDropEvents: function(dropper) {
            
            dropper.addEventListener('dragover', function(e) {
                e.preventDefault(); // On autorise le drop d'éléments
                //alert("Vous passez au dessus")
                this.className = 'dropper drop_hover'; // Et on applique le style adéquat à notre zone de drop quand un élément la survole
            }, false);
            
            dropper.addEventListener('dragleave', function() {
                this.className = 'dropper'; // On revient au style de base lorsque l'élément quitte la zone de drop
                //alert("vous quittez la zone de drop")
            });
            
            var dndHandler = this; // Cette variable est nécessaire pour que l'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

            dropper.addEventListener('drop', function(e) {

                var target = e.target,
                draggedElement = dndHandler.draggedElement, // Récupération de l'élément concerné
                clonedElement = draggedElement.cloneNode(true); // On créé immédiatement le clone de cet élément
                
                while(target.className.indexOf('dropper') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
                    target = target.parentNode;
                }

                target.className = 'dropper'; // Application du style par défaut
                
                clonedElement = target.appendChild(clonedElement); // Ajout de l'élément cloné à la zone de drop actuelle
                dndHandler.applyDragEvents(clonedElement); // Nouvelle application des événements qui ont été perdus lors du cloneNode()                
            });
            
        }
 
    };
    
    

    function ajouterLigne()
    {
        var tableau = document.getElementById("tbody")
        var col = document.getElementById("thead").rows
        var ligne = tableau.insertRow(-1)//on a ajouté une ligne

        var colonne1 = ligne.insertCell(0)//on a une ajouté une cellule
        colonne1.innerHTML += document.getElementById("dev").value

        var i=1
        var length = col[0].cells.length

        //The next area for drop element draggable
        var divDropper = document.createElement('div')
        divDropper.className = "dropper"

        //Add des cellules dynamiquement
        colonne = new Array()
        for (i; i< length; ++i){
            colonne[i] = ligne.insertCell(i)//on ajoute les length - 1 cellule
            colonne[i].className = "active"//bootstrap skin
            colonne[i].id = "tobeDropped"
            dupNode =divDropper.cloneNode(true);
            colonne[i].appendChild(dupNode)
        }
        addDropper()
    }   


    function addDropper(){
        alert("yo2")
        var droppers = document.querySelectorAll('.dropper'),
            droppersLen = droppers.length;
        
        for(var i = 0 ; i < droppersLen ; i++) {
            dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
    }

    var elements = document.querySelectorAll('div.draggable'),
    elementsLen = elements.length
    for(var i = 0 ; i < elementsLen ; i++) {
        dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
    }



}





