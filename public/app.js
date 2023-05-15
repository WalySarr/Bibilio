function deleteFormConfirmation() {
    $('.delete-form').submit(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Etes vous sûr de vouloir procéder à la suppression?',
            text: "Cette action est irréversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
                Swal.fire(
                    'Supprimé!',
                    'Votre thème a été supprimé avec succès.',
                    'success'
                )
            }
        });
    });
}

// Appeler la fonction pour activer la confirmation de suppression des formulaires

function updateFormConfirmation() {
    $('.update-form').submit(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Etes vous sûr de vouloir procéder à la Modification ?',
            text: "Cette action est irréversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, modifier!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    });
}