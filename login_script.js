<script>
$(document).ready(manipular);


function manipular() {
  $("#btn").click(function() {
    $(this).hide();
  });
  $("#usu_email").blur(function() {
    alert("oi");
  });
}
</script>