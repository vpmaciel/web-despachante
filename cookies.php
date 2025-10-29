<div id="cookieConsent" style="display: none;">
    Este site usa cookies. Você aceita o uso de cookies?
    <button id="acceptCookies">Sim</button>
    <button id="declineCookies">Não</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var cookieConsent = document.getElementById('cookieConsent');
    var acceptCookies = document.getElementById('acceptCookies');
    var declineCookies = document.getElementById('declineCookies');

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Verifica se o cookie de consentimento está presente
    if (!getCookie('cookieConsent')) {
        cookieConsent.style.display = 'block';
    }

    acceptCookies.addEventListener('click', function () {
        setCookie('cookieConsent', 'accepted', 1); // Define o cookie por 1 dias
        cookieConsent.style.display = 'none';
    });

    declineCookies.addEventListener('click', function () {
        window.location.href = '/web-despachante/index.php'; // Redireciona para a pasta desejada
    });

});
</script>