// Funciones para mostrar y ocultar el modal de confirmación
function showConfirmationModal() {
    var modal = document.getElementById("confirmation-popup");
    if (modal) {
        modal.style.display = "block";
    }
}

function hideConfirmationModal() {
    var modal = document.getElementById("confirmation-popup");
    if (modal) {
        modal.style.display = "none";
    }
}


document.addEventListener("DOMContentLoaded", function() {
    
    var logoutButton = document.querySelector("[name='logout']");
    if (logoutButton) {
        logoutButton.addEventListener("click", function(event) {
            showConfirmationModal();
        });
    }

    
    var cancelButton = document.getElementById("cancel-button");
    if (cancelButton) {
        cancelButton.addEventListener("click", function() {
            hideConfirmationModal();
        });
    }
});
