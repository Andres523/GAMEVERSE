<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Services Section</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
 
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    
    
  </head>
  <body>
    <a href="index.php">Volver</a>
    <section>
      <div class="row">
        <h2 class="section-heading">¿Que quieres Hacer hoy?</h2>
      </div>

      <div class="row">
        <a href="usuarios.php" style="color: inherit; text-decoration: none;">
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-person"></i>
            </div>
            <h3>Usuarios</h3>
            <p>
              Revisar que usuarios Estan en la plataforma Editarlos o eliminarlos
            </p>
          </div>
          </a>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-gamepad"></i>
            </div>
            <h3>Juegos</h3>
            <p>
              agregar editar y eliminar juegos de tu catalogo 
            </p>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-dragon"></i>
            </div>
            <h3>Productos Marketplace</h3>
            <p>
              agregar editar y eliminar productos, comics, figuras de tu catalogo
            </p>
          </div>
        </div>
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-truck"></i>
            </div>
            <h3>Ventas</h3>
            <p>
              Revision de las ventas y el envio de productos
            </p>
          </div>
        
        </div>
      </div>
    </section>
  </body>
</html>


<style>
    * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
section {
  height: 100vh;
  width: 100%;
  display: grid;
  place-items: center;
}
.row {
  display: flex;
  flex-wrap: wrap;
}
.column {
  width: 100%;
  padding: 0 1em 1em 1em;
  text-align: center;
}
.card {
  width: 100%;
  height: 100%;
  padding: 2em 1.5em;
  background: linear-gradient(#ffffff 50%, #2c7bfe 50%);
  background-size: 100% 200%;
  background-position: 0 2.5%;
  border-radius: 5px;
  box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  transition: 0.5s;
}
h3 {
  font-size: 20px;
  font-weight: 600;
  color: #1f194c;
  margin: 1em 0;
}
p {
  color: #575a7b;
  font-size: 15px;
  line-height: 1.6;
  letter-spacing: 0.03em;
}
.icon-wrapper {
  background-color: #2c7bfe;
  position: relative;
  margin: auto;
  font-size: 30px;
  height: 2.5em;
  width: 2.5em;
  color: #ffffff;
  border-radius: 50%;
  display: grid;
  place-items: center;
  transition: 0.5s;
}
.card:hover {
  background-position: 0 100%;
}
.card:hover .icon-wrapper {
  background-color: #ffffff;
  color: #2c7bfe;
}
.card:hover h3 {
  color: #ffffff;
}
.card:hover p {
  color: #f0f0f0;
}
@media screen and (min-width: 768px) {
  section {
    padding: 0 2em;
  }
  .column {
    flex: 0 50%;
    max-width: 50%;
  }
}
@media screen and (min-width: 992px) {
  section {
    padding: 1em 3em;
  }
  .column {
    flex: 0 0 33.33%;
    max-width: 33.33%;
  }
}
</style>