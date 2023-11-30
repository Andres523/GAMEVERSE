function showConfirmationModal() {
    var modal = document.getElementById("confirmation-popup");
    modal.style.display = "block";
}

function hideConfirmationModal() {
    var modal = document.getElementById("confirmation-popup");
    modal.style.display = "none";
}

document.getElementById("cancel-button").addEventListener("click", function() {
    hideConfirmationModal();
});


