document.addEventListener("DOMContentLoaded", function () {

    const params = new URLSearchParams(window.location.search);

    if (params.get("voltar") === "true") {
        setTimeout(function () {
            history.back(); // NÃO recarrega a página
        }, 5000);
    }

});
