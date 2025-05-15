document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".btn-delete").forEach(button => {
        button.addEventListener("click", function(event) {
            if (!confirm("Tem certeza que deseja remover este item?")) {
                event.preventDefault();
            }
        });
    });
});