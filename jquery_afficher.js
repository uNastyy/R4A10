var list = [];

$(document).ready(function() {
    // Appel de la fonction pour récupérer les messages
    recupererMessages();
});


function recupererMessages(){
    $.ajax({
        url: 'recuperer.php',
        type: 'get',
        dataType: 'json', // Précisez que vous attendez une réponse JSON
        success: function(data) {
            // Parcours du tableau d'objets JSON
            for (var i=0;i<data.length;i++){
                // Ajout du message à la liste
                list.push(data[i]);
            }
            data.forEach(function(message) {
                if (list.includes(message.idMessage)) {
                } else {
                    list.push(message.idMessage);
                
                    var div = document.createElement('div');
                    div.className = 'message';

                    // Création d'un élément p pour afficher le contenu du message
                    var p = document.createElement('p');
                    p.className = 'contenu';
                    p.textContent = message.contenu; // Utilisez textContent pour éviter les problèmes de sécurité
                    div.append(p);

                    var span1 = document.createElement('span');
                    span1.className = 'userPseudo';
                    span1.textContent = message.userPseudo;
                    div.append(span1);

                    div.append(' | ');
                    var span2 = document.createElement('span');
                    span2.className = 'horaire';
                    var horaire = message.horaire.split(' ');
                    span2.textContent = horaire;
                    div.append(span2);

                    var hr = document.createElement('hr');
                    div.append(hr);
                    // Ajout du message à l'élément contenant $(".messages-container")
                    $(".messages-container").append(div);
                }
            });
        }
    });
}