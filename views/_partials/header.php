<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="../assets/jquery-ui-1.12.1.custom/jquery-ui.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

        <title><?= isset($title) ? "Singleton | ".$title : "" ?></title>
        <script type="text/javascript">
		$(document).ready(function(){
			$('.myTable').DataTable({
			"language": {
                                "sProcessing":     "Traitement en cours...",
				"sSearch":         "Rechercher&nbsp;:",
				"sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
				"sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
				"sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
				"sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
				"sInfoPostFix":    "",
				"sLoadingRecords": "Chargement en cours...",
				"sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
				"sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
				"oPaginate": {
					"sFirst":      "Premier",
					"sPrevious":   "Pr&eacute;c&eacute;dent",
					"sNext":       "Suivant",
					"sLast":       "Dernier"
				},
				"oAria": {
					"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
					"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
				}
                            }
			});
			
		});
                $(function () {
                    $( "#confirmation" ).dialog({
                        autoOpen: false,
                        width: 500,
                        hide: "fade"
                    });
                    $(".boutonsupprimer").click(function(event) {
                    event.preventDefault();
                    var targetUrl = $(this).attr("href");
                    $("#confirmation").dialog({
                    buttons: [{  
                                    text: "Oui",    
                                    click: function () {
                                        window.location.href = targetUrl;
                                    }
                                },
                                {
                                    text: "Non",
                                    click: function () {
                                        $(this).dialog("close");
                                    }
                                }]
                        });
                        $("#confirmation").dialog("open");
                    });
                });


        </script>
    </head>
    
    <body>
        <div class="container">
        <?php include 'nav.php'; ?>
    