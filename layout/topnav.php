<style>
	#navbarSupportedContent ul li{
		margin-left: 30px;
	}
</style>
<script>
    function newTab(url) {
        window.open(url, '', 'width=10');
    }
</script>  

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="../../img/logo.jpg" style="width:30px;height:30px; margin-right: 5px; margin-bottom: 5px;" class="img-fluid" alt="Tec Logo">
  <h4 class="navbar-left"><b>HorariosTec</b></h4>
  <div class="collapse navbar-collapse navbar-right" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" OnClick="newTab('/horariostec/modules/tablero')" href="#">Tablero</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/horariostec/modules/checkIn">Check In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/horariostec/modules/gateControl">Control de Turno</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/horariostec/modules/admin">Admin</a>
      </li>
    </ul>
  </div>
</nav>