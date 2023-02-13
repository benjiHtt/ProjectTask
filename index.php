<!DOCTYPE html>

<?php
include('functions.php');
session_start();
?>

<html lang="en">
  <head>
    <!--*********************************************************************** -->
    <!-- by : D csapat[Lieber Marcell ][Varga Péter ][Hitter Benjámin ] -->
    <!-- Jelenleg 9 sectionbol áll az oldal: 1.Navbar 2.Showcase 3.Hírlevél 4.Boxes 5.Tech 6.Learn 7.GYIK 8.Kontakt-Térkép 9.Footer-->
    <!--utolsó modosítás : Hitter Benjámin 16:02 2023/02/11-->
    <!--*********************************************************************** -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="img/favicon.svg">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Bottyanchat</title>

      <script>

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})

</script>


  </head>
  <body>
    <!-- 1. Navbar Section-->
    <!-- utolsó modosítás : Hitter Benjámin 1:55 2023/02/11-->
  <div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
      <div class="container">

      <a href="#" class="navbar-brand">
      <svg height="130" width="400">
    <defs>
    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:rgb(13,110,253);stop-opacity:1" />
      <stop offset="100%" style="stop-color:rgb(255,0,0);stop-opacity:1" />
    </linearGradient>
    </defs>
    <ellipse cx="200" cy="70" rx="185" ry="50" fill="url(#grad1)" />
    <text fill="#ffffff" font-size="45" font-family="Verdana" x="63" y="86">Bottyanchat</text>
     Sajnos a bongésződ nem támogatja az SVG formátumot :(
    </svg>
      </a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
          <li class="nav-item">
              <a href="#login__" class="nav-link">Belépés</a>
            </li>
            <li class="nav-item">
              <a href="#tech" class="nav-link">Technológia</a>
            </li>
            <li class="nav-item">
              <a href="#questions" class="nav-link">Kérdések</a>
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link">Kapcsolat</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
   
    <!-- 2. Showcase Section-->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->

  <div>
    <section id="login__"
      class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start"
    >
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Lépj be a <span class="text-warning"> Bottyanchat </span> fiókodba</h1>
            <p class="lead my-4">
              Adminisztrációs fiókba való belépésre kattints a gombra:
            </p>
            <form action="login.php">
            <input type="submit" class="btn btn-primary" value="Bejelentkezés" name="belepo" id="belepo">
              </form>
   
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="img/showcase.svg"
            alt="showcase kep error"
          />
        </div>
      </div>
    </section>
  </div>
    <!-- 3. Hírlevél Section-->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
  <div>
    <section class="bg-primary text-light p-5">
      <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
          <h3 class="mb-3 mb-md-0">Iratkozz fel a hírlevelünkre!</h3>

          <div class="input-group news-input">
            <input type="text" class="form-control" placeholder="email címed helye" />
            <button class="btn btn-dark btn-lg" type="button">Go!</button>
          </div>
        </div>
      </div>
    </section>
  </div>

    <!-- 4.Boxes Section-->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
  <div>
    <section class="p-5">
    <div>
      <div class="container">
        <div class="row text-center g-4">
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class="bi bi-laptop"></i>
                </div>
                <h3 class="card-title mb-3">Virtuálisan</h3>
                <p class="card-text">
                 Vedd fel a kapcsolatot a Bottyán János Kutatóközponttal virtuálisan:
                </p>
                <a href="#" class="btn btn-primary">Tovább</a>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card bg-secondary text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class="bi bi-person-square"></i>
                </div>
                <h3 class="card-title mb-3">Személyesen</h3>
                <p class="card-text">
                Vedd fel a kapcsolatot a Bottyán János Kutatóközponttal személyesen:
                </p>
                <a href="#contact" class="btn btn-dark">Tovább</a>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class="bi bi-people"></i>
                </div>
                <h3 class="card-title mb-3">Emailben</h3>
                <p class="card-text">
                Vedd fel a kapcsolatot a Bottyán János Kutatóközponttal emailben:
                </p>
                <a href="#contact" class="btn btn-primary">Tovább</a>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </section>
  </div>

    <!-- 5.Tech Sections -->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
  <div>
    <section id="tech" class="p-5">
   
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md">
            <img src="img/fundamentals.svg" class="img-fluid" alt="" />
          </div>
          <div class="col-md p-5">
            <h2>HTML,PHP,CSS</h2>
            <p class="lead">
              A webfejlesztés alapeszközeinek számító HTML/PHP/CSS nyelveken alapul a weboldal.
            </p>
            <p> Mind a három nyelv korszerű és modern, kiválóan és dinamikusan használható webfejlesztéshez.
            </p>
            <a href="https://hu.wikipedia.org/wiki/HTML" target="_blank" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i> Mi az a HTML?
            </a>
            <a href="https://hu.wikipedia.org/wiki/PHP" target="_blank" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i> Mi az a PHP?
            </a>
            <a href="https://hu.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i> Mi az a CSS?
            </a>
          </div>
        </div>
      </div>

    </section>
</div>

    <!-- 6.Learn Sections -->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
  <div>

    <section id="learn" class="p-5 bg-dark text-light">
    
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md p-5">
            <h2>MySQL</h2>
            <p class="lead">
              A weboldal MySQL adatbázist használ adminisztrációs célokra.
            </p>
            <p>
              Ez egy széles körben elterjedt és korszerű technológia, széles körben elterjedt és könnyen használható.
            </p>
            <a href="https://hu.wikipedia.org/wiki/MySQL" target="_blank" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i> Mi az a MySQL?
            </a>
          </div>
          <div class="col-md">
            <img src="img/mysql.png" class="img-fluid" alt="" />
          </div>
        </div>
      </div>

    </section>
  </div>

    <!-- 7. GYIK Accordion Section-->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
  <div>
    <section id="questions" class="p-5">
    
      <div class="container">
        <h2 class="text-center mb-4">Gyakran Ismételt Kérdések</h2>
        <div class="accordion accordion-flush" id="questions">
          <!-- Item 1 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#question-one"
              >
                Hogyan tudok regisztrálni?
              </button>
            </h2>
            <div
              id="question-one"
              class="accordion-collapse collapse"
              data-bs-parent="#questions"
            >
              <div class="accordion-body">
                A regisztrációt egy admin és vagy egy vezér végzi, manuális regisztrációra nincs lehetőség.
              </div>
            </div>
          </div>
          <!-- Item 2 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#question-two"
              >
                Mit csinál a csoport vezér?
              </button>
            </h2>
            <div
              id="question-two"
              class="accordion-collapse collapse"
              data-bs-parent="#questions"
            >
              <div class="accordion-body">
                A vezér szintén felhasználók tud regisztrálni, emellett információt tud megosztani.
            </div>
          </div>
          <!-- Item 3 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#question-three"
              >
                Mit csinál egy felhasználó?
              </button>
            </h2>
            <div
              id="question-three"
              class="accordion-collapse collapse"
              data-bs-parent="#questions"
            >
              <div class="accordion-body">
                A felhasználó fájlt tud feltölteni és letölteni.
              </div>
            </div>
          </div>
          <!-- Item 4 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#question-four"
              >
                Mit csinál a chat?
              </button>
            </h2>
            <div
              id="question-four"
              class="accordion-collapse collapse"
              data-bs-parent="#questions"
            >
              <div class="accordion-body">
                A létrehozott csoportokban teszi lehetővé hogy a csoporttagok számára a kommunikációt.
              </div>
            </div>
          </div>
          <!-- Item 5 -->
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#question-five"
              >
                Hogyan működnek a csoportok ?
              </button>
            </h2>
            <div
              id="question-five"
              class="accordion-collapse collapse"
              data-bs-parent="#questions"
            >
              <div class="accordion-body">
                Dokumentumok cseréjét teszi lehetővé, az admin tudja felvenni a csoportokat és azok vezérét.
              </div>
            </div>
          </div>
        </div>
      </div>
  
     </section>
  </div>

    <!-- 8. Kontakt & Térkép Section -->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
  <div>
    <section id="contact" class="p-5">
  
      <div class="container">
        <div class="row g-4">
          <div class="col-md">
            <h2 class="text-center mb-4">KAPCSOLAT:</h2>
            <ul class="list-group list-group-flush lead">
              <li class="list-group-item">
                <span class="fw-bold">Cím:</span> 2500 Esztergom, Főapát u. 1.
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Porta Telefon:</span> 06-70/684-8560
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Titkárság Telefon:</span> 06-70/684-8555
              </li>
              <li class="list-group-item">
                <span class="fw-bold">E-mail: </span> titkarsag@bottyan.eu
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Bottyán János Kutatóközpont E-mail: </span> bottyan@research.eu
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Honlap:</span>www.bottyan.eu
              </li>
            </ul>
          </div>
          <div class="col-md">
            <div id="map"></div>
          </div>
        </div>
      </div>

    </section>
 </div>
    <!-- 9.  Footer Section -->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
  <div>
    <section id="footer" >
  
    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy; 2023 Bottyán János Kutatóközpont</p>
        <p class="lead"> D Csapat</p>

        <a href="#" class="position-absolute bottom-0 end-0 p-5">
          <i class="bi bi-arrow-up-circle h1"></i>
        </a>
      </div>
    </footer>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

    <script>
      mapboxgl.accessToken =
        'pk.eyJ1IjoiYnRyYXZlcnN5IiwiYSI6ImNrbmh0dXF1NzBtbnMyb3MzcTBpaG10eXcifQ.h5ZyYCglnMdOLAGGiL1Auw'
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [18.740335812730223,47.790235593915895],
        zoom: 18,
      })
    </script>
  
    </section>
</div>

<!-- Tartaom Vége -->
  </body>
</html>