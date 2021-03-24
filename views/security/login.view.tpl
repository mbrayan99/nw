
<section class="login_body">
  <form id="formLogin" action="index.php?page=login" method="POST">
    <div class="page-container">
        <div class="separacion"></div>
        <h1>Inicio de Sesión</h1>
        <input name="returnto" value="{{returnto}}" type="hidden" />
        <input name="tocken" value="{{tocken}}" type="hidden" />
          <div class="separacion"></div><div class="separacion"></div>
          <input type="text" name="txtEmail" id="txtEmail" value="{{txtEmail}}" class="username" placeholder="Correo Electrónico"/>
          <div class="separacion"></div>
          <input type="password" name="txtPswd" id="txtPswd" value="" class="password" placeholder="Contraseña"/>
          <div class="separacion"></div>
        <div class="row">
          <button class="col-md-12 btn-primary" id="btnSend"><span class="ion-log-in"></span>&nbsp;Iniciar Sesión</button>
        </div>
        {{if showerrors}}
        <div class="alert alert-danger">
          <ul style="margin-bottom:1em !important;">
            {{foreach errors}}
            <li>
              {{this}}
            </li>
            {{endfor errors}}
          </ul>
        </div>
        {{endif showerrors}}
    </div>
  </form>
</section>
<div class="entreEspacios"></div>

<style>
  .espacios{
    margin-top: 100px;
  }

  .entreEspacios{
    margin-top: 170px;
  }

  
</style>

<script>
  $().ready(
    function () {
      $("#btnSend").click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $("#formLogin").submit();
      });
    }
  );
</script>

<style>
  .col-md-12 {
    background-color: #c18907;
  }

  .password {
    background-color: white;
  }

  .username {
    background-color: white;
  }

  .separacion{
    margin-top: 50px;
  }  

  .page-container h1{
    color:black;
    
  }

  .page-container input{
    border: 1px solid black;
    width: 600px;
    margin-left: -140px;
  }

  .separacion{
    margin-top: 20px;
  }

  .row{
    width: 600px;
    margin-left: -140px;
  }

  .row button{
    font-size: 20px;
  }
</style>
