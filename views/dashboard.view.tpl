<!-- Por cada producto se mostrara una cartita en el inicio de la pagina -->

<section class="sec_galeria">
  <h2>Catálogo de nuestros productos</h2>
</section>

<section class="infod">
  <p>Revisa nuestro catálogo de reposteria y panaderia de alta calidad. Podrás revisar aquí tus productos preferidos a un excelente precio</p>
  <p id="p2"></p>
</section>

<section class="row"> 
  <section class="textobasico">
    <h3><b>Panaderia</b></h3> 
  </section>
  {{foreach panaderia}}
    <section class="col-sm-6 col-md-3 m-padding">
      <div class="card col-13 depth-2 m-padding">

        <span class="col-sm-12 center depth-1">
          <!-- Si existe imagen pequeña la muestra -->
          {{if urlthbprd}}
            <img src="{{urlthbprd}}" alt="{{codprd}} {{dscprd}}" class="imgthumb center"/>
          {{endif urlthbprd}}
        </span>


        <!-- Mostrando codigo interno y descripcion del producto -->
        <span class="col-112 col-12 center depth-1 m-padding card-desc">
          <span class="card-side">{{skuprd}}</span>
          <span class="col-12">{{dscprd}}</span>
        </span>

          <!-- Boton para añadir a la carretilla -->
          <span class="col-12 bold center m-padding">
            <a href="index.php?page=addToCart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart"> L {{prcprd}}</a>
          </span>
        </span>

      </div>
    </section>
  {{endfor panaderia}} 
</section>
</br>
</br>

<section class="row">
  <section class="textobasico">
    <h3><b>Reposteria</b></h3>
  </section>
  {{foreach reposteria}}
  <section class="col-sm-6 col-md-3 m-padding">
    <div class="card col-13 depth-2 m-padding">

      <span class="col-sm-12 center depth-1">
        <!-- Si existe imagen pequeña la muestra -->
        {{if urlthbprd}}
        <img src="{{urlthbprd}}" alt="{{codprd}} {{dscprd}}" class="imgthumb center" />
        {{endif urlthbprd}}
      </span>


      <!-- Mostrando codigo interno y descripcion del producto -->
      <span class="col-112 col-12 center depth-1 m-padding card-desc">
        <span class="card-side">{{skuprd}}</span>
        <span class="col-12">{{dscprd}}</span>
      </span>

      <!-- Boton para añadir a la carretilla -->
      <span class="col-12 bold center m-padding">
        <a href="index.php?page=addToCart&codprd={{codprd}}" class="l-padding btn btn-primary col-12 sendToCart"> L
          {{prcprd}}</a>
      </span>
      </span>

    </div>
  </section>
  {{endfor reposteria}}
</section>
</br>
</br>



<script>

  /* Ruta que devuelva un archivo JSON al dar clic en sendToCart.
     Se manda por post el hipervinculo y en console sale lo que devuelve.
  */

  $().ready(function()
  {
    $(".sendToCart").click(function(e)
    {
      e.preventDefault();
      e.stopPropagation();

      $.post(
        $(this).attr("href"),
        function(data, success, xqXML)
        {
          console.log(data);

          /* Si cartAmount existe y es mayor que 0 */
          if(data.cartAmount && data.cartAmount > 0)
          {
            window.location.reload();
          }
        }
      )
    });

  });

</script>

<style>
  .sec_galeria h2{
  text-align: center;
  font-size: 1.7rem;
	margin: 1em 1em;
	padding: 8px;
  background:  linear-gradient(to right,#F6CB0A, #c4a106);
	box-shadow: -5px 5px 1px black;
	font-family: "Oswald", "Arial", sans-serif; 
  margin-left: 40px;
}

.infod p{
  margin-left: 40px;
  
}

.textobasico h3{
  margin-left: 40px;
}

.infod{
	max-width: 1280px; /*1350*/
	margin: 0px auto;
}

  .infod p{
    padding-top: 1rem;
    padding-bottom: 1rem;
    font-size: 1.5rem; 
  }

  .infod p#p2{
    padding-top: 0rem;
    margin-bottom: 1.5rem;
  }

  .textobasico{
    font-size: 0.9rem;
  }

  .card{
    position: relative;
    margin-left: 8px;
  }

  .card-desc{
    height: 4em;
    overflow: hidden; /*scroll*/
  }

  .card-side{
      position: absolute;
      top:6em;
      left:1em;
      transform-origin: left top;
      transform: rotate(-90deg);
  }

  .l-padding{
    background-color: #F6CB0A;
    color: black;
  }

  .col-13{
    background-color: black;
  }

  .l-padding:hover{
    background-color: white;
    color: black;
  }

  .col-sm-12{
    background-color: white;
  }

  .col-112{
    background-color: white;
  }

  .sendToCart{
    text-decoration: none;
  }


</style>
