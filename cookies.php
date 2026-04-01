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

    // Criar cookie em minutos
    function setCookieMinutes(name, value, minutes) {
        var date = new Date();
        date.setTime(date.getTime() + (minutes * 60 * 1000));
        document.cookie = name + "=" + value +
            "; expires=" + date.toUTCString() +
            "; path=/";
    }

    // Ler cookie
    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i].trim();
            if (c.indexOf(nameEQ) === 0) {
                return c.substring(nameEQ.length);
            }
        }
        return null;
    }

    // Verifica consentimento
    var consent = getCookie('cookieConsent');

    // 🔥 Mostra banner somente se NÃO aceitou
    if (consent !== 'accepted') {
        cookieConsent.style.display = 'block';
    }

    // ✅ Aceitar → salva e esconde
    acceptCookies.addEventListener('click', function () {
        setCookieMinutes('cookieConsent', 'accepted', 60);
        cookieConsent.style.display = 'none';
    });

    // ❌ Recusar → não salva e NÃO trava
    declineCookies.addEventListener('click', function () {
        // Apenas não faz nada
        // O banner continua visível, mas sem bloquear nada
    });

});
</script>