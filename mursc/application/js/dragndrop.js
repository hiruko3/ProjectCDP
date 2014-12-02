
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
            })
            
            var dndHandler = this // Cette variable est nécessaire pour que l'événement « drop » ci-dessous accède facilement au namespace « dndHandler »

            dropper.addEventListener('drop', function(e) {
                this.className = 'dropper drop'
                var target = e.target
                var draggedElement2 = dndHandler.draggedElement // Récupération de l'élément concerné
                
                while(target.className.indexOf('dropper') == -1) { // Cette boucle permet de remonter jusqu'à la zone de drop parente
                    target = target.parentNode
                }

                target.appendChild(draggedElement2)
            })
            
        }
 
    }

    function deleteThisTask(paramTask){
        if (confirm('Voules vous vraiment supprimer cette tâche ?')){
            var a = document.getElementById(paramTask)
            b = a.parentNode
            if(b)
                b.parentNode.removeChild(b)
        }
    }
        
    function confirmation(){
        var mess = ''
        var name = document.getElementById('dev').value
        if(name == '') { mess += 'Veuillez renseigner un nom' }
        if (mess != '')
            alert(mess)
        else
            return true
    }

    function ajouterLigne()
    {
        if(confirmation()){
            var tableau = document.getElementById("tbody")
            var col = document.getElementById("thead2").rows
            var ligne = tableau.insertRow(-1)

            var colonne1 = ligne.insertCell(0)
            colonne1.innerHTML += document.getElementById("dev").value  //insère le nom du dev dans la première cellule

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
                colonne[i].height = "50px"
                divDropper.height = "50px"
                dupNode =divDropper.cloneNode(true);
                colonne[i].appendChild(dupNode)
            }
            addDropper()
        }
    }   


    function addDropper(){
        var droppers = document.querySelectorAll('.dropper'),
            droppersLen = droppers.length;
        
        for(var i = 0 ; i < droppersLen ; i++) {
            dndHandler.applyDropEvents(droppers[i]); // Application des événements nécessaires aux zones de drop
        }
    }

    function addDraggable(){
        var elements = document.querySelectorAll('.draggable'),
        elementsLen = elements.length
        for(var i = 0 ; i < elementsLen ; i++) {
            dndHandler.applyDragEvents(elements[i]); // Application des paramètres nécessaires aux éléments déplaçables
        }
    }
    


    //TODO

    function displayTask(){
        //Appel de l'affichage de la vue
    }



