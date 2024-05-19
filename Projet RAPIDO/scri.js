$(document).ready(function() {
    $('.termine').click(function() {
          let chauffeurId = $(this).val();
         let courseId = $(this).closest('tr').find('td:first').text();

        $.ajax({
            url: 'terminer.php', 
            method: 'POST',
            data: {
                id: chauffeurId, course_id: courseId
            },
            success: function() {

                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la mise à jour de la disponibilité du chauffeur:', error);
            }
        });  
        console.log(chauffeurId);
    });
});
