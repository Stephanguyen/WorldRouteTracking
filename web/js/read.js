document.addEventListener("DOMContentLoaded", function(event){

    ajax2();
    document.getElementById("submit").addEventListener('click', function(event){
        event.preventDefault(); // Annule le rafraichissement à l'appuie du submit
        ajax(); // exécute notre fonction ajax() pour le traitement du submit 
        
    
    });
    
    function ajax() {
        if(window.XMLHttpRequest) r = new XMLHttpRequest(); // Pour la plupart des navigateurs web 
        else r = new ActiveXObject("Microsoft.XMLHTTP"); // Pour internet explorer v7 et antérieures 
        
        // On récupère les valeurs des champs correspondant aux id
        // var marque = document.getElementById("marque").value;
        // var modele = document.getElementById("modele").value;
        // var annee = document.getElementById("annee").value;
        // var couleur = document.getElementById("couleur").value;
    
    
        var p = document.getElementById("ville");
        var ville = p.options[p.selectedIndex].value;
        var parameters = "ville="+ville;
        
    
        // Preparation requete pour ajax.php
        r.open("POST", "entities/cartes/read.php", true);
    
        // Modification d'entête
        r.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
        r.onreadystatechange = function()	// Quand l'état change
        {
            if(r.readyState == 4 && r.status == 200)
            {
                console.log(r.responseText);
                
                var obj = JSON.parse(r.responseText);
                document.getElementById("resultat").innerHTML = "<span> Id:" + obj.coordonnees[0].latitude + "</span>";
                
                console.log(obj.coordonnees);
                drawPolyline(obj.coordonnees);
            }
        }
    
        // Envoie requete avec paramètres
        // r.send('param1=' + marque + '&param2=' + modele + '&param3=' + annee + '&param4=' + couleur);
        r.send(parameters);
        // document.getElementById("resultat").innerHTML = "<div style=\"background: #22d3a7;\">Products: " + products + "</div>";
        // document.getElementById("personne").value = "";
    
    }
    
    });
    
    
    
    function ajax2() {
    if(window.XMLHttpRequest) r2 = new XMLHttpRequest(); // Pour la plupart des navigateurs web 
    else r2 = new ActiveXObject("Microsoft.XMLHTTP"); // Pour internet explorer v7 et antérieures 
    
    // On récupère les valeurs des champs correspondant aux id
    // var marque = document.getElementById("marque").value;
    // var modele = document.getElementById("modele").value;
    // var annee = document.getElementById("annee").value;
    // var couleur = document.getElementById("couleur").value;
    
    
    // var p = document.getElementById("ville");
    // var ville = p.options[p.selectedIndex].value;
    // var parameters = "ville="+ville;
    
    
    // Preparation requete pour ajax.php
    r2.open("POST", "entities/cartes/read2.php", true);
    
    // Modification d'entête
    r2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    r2.onreadystatechange = function()	// Quand l'état change
    {
        if(r2.readyState == 4 && r2.status == 200)
        {
            var options = '';
            console.log(r2.responseText);
            
            
            var obj = JSON.parse(r2.responseText);
            for (let i = 0; i < obj.tousVille.length; i++) {
                options += "<option value=\""+obj.tousVille[i]+"\">"+obj.tousVille[i]+"</option>" ;
            }
            document.getElementById("ville").innerHTML = options;
            
            
        }
    }
    
    // Envoie requete avec paramètres
    // r.send('param1=' + marque + '&param2=' + modele + '&param3=' + annee + '&param4=' + couleur);
    r2.send();
    // document.getElementById("resultat").innerHTML = "<div style=\"background: #22d3a7;\">Products: " + products + "</div>";
    // document.getElementById("personne").value = "";
    
    }
    
    
    
    var map;
    
    // var flightPlanCoordinates = obj.coordonnees;
    
    // console.log(this.flightPlanCoordinates);
    
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
    zoom: 3,
    center: {lat: 0, lng: -180},
    mapTypeId: 'terrain'
    });
    
    }
    
    function drawPolyline(path){
    initMap();
    // var flightPlanCoordinates = obj.coordonnees;
    var flightPath = new google.maps.Polyline({
        path: path,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
        });
    
        flightPath.setMap(this.map);
    }