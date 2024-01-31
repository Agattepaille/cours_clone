$(document).ready(function(){
    
    $("#submit").click(function(e){
        e.preventDefault();
            $.ajax({
            url:"../controller/signUp.action.php",
            type:'POST',
			dataType: 'json', //text
            data: {
                name : $("#name").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                firstname : $("#firstname").val(),
                address : $("#address").val(),
                tel : $("#tel").val(),
                mail : $("#mail").val(),
                login : $("#login").val(),
                password : $("#password").val()
                
            },
            success:function(response){		
				console.log(response);
				alert("L'utilisateur a bien été inséré en BDD");
                
                // Clear the form fields
                $("#name").val(''),
                $("#firstname").val(''),
                $("#address").val(''),
                $("#tel").val(''),
                $("#mail").val(''),
                $("#login").val(''),
                $("#password").val(''),
                $("#selectedAddress").val('')

            },
			error:function(response){
                console.log('error');
				alert("error");

            }
			
        });
    });

});


$(document).ready(function(){
    $("#address").keyup(function(e){
        e.preventDefault();

        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?q=",
            type: 'get',
            data: {
                q: $("#address").val(),
            },
            success: function(response) {
                console.log(response);

                // Clear previous options
                $("#selectedAddress").empty();

                for (let index = 0; index < 3; index++) {
                    if (index < response.features.length) {
                        $("#resultat" + index).text(response.features[index].properties.label);
                        $("#resultat" + index).addClass("resultat");
                        // Add new options based on the API response
                        $("#selectedAddress").append(`<option value="${response.features[index].properties.label}">${response.features[index].properties.label}</option>`);
                    } else {
                        $("#resultat" + index).empty();
                        $("#resultat" + index).removeClass("resultat");
                    }
                }

                // Ajout d'un événement de clic pour chaque div résultat
                $(".resultat").on("click", function() {
                    var selectedAddress = $(this).text();
                    $("#address").val(selectedAddress);
                    $(".resultat").empty(); // Effacement des divs de résultat après la sélection
                });

                // Ajout d'un gestionnaire d'événements au changement de sélection du menu déroulant
                    $("#selectedAddress").on("click", function() {
                    // Remplissage de l'input "Address" avec l'adresse sélectionnée dans le menu déroulant
                    $("#address").val($(this).val());
                });

            },
            error: function(response) {
                console.log('error');
            }
        });
    });
});

 

