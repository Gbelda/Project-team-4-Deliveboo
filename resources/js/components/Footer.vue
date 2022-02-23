<template>
  <footer id="site_footer">
    <div class="container">
      <div class="row">
        <div class="col-4">
          <a href="/" class="nav-link"
            ><img src="../../img/jumbo/logo.png" alt="immagine logo Deliveboo"
          /></a>
          <div class="app_store">
            <a href="#">
              <img
                class="app_store_logo"
                src="../../img/footer/app_store.jpg"
                alt="immagine apple store"
              />
            </a>
            <a href="#">
              <img
                class="app_store_logo"
                src="../../img/footer/google_play.svg.png"
                alt="immagine google play"
              />
            </a>
          </div>
          <div class="">
            <p>&copy; Deliveboo Italy s.r.l. 2022</p>
          </div>
        </div>
        <div class="col-4">
          <div class="">
            <h6>Scopri Deliveboo</h6>
            <ul>
              <li>
                <router-link to="/who_we_are">Chi siamo</router-link>
                <!-- <a :href="'/who_we_are/'">Chi siamo</a> -->
              </li>
              <li>
                <a href="#">Investitori</a>
              </li>
              <li>
                <a href="#">Lavora con noi</a>
              </li>
              <li>
                <a href="#">Ristoranti</a>
              </li>
              <li>
                <a href="#">Diventa nostro partner</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-4">
          <div>
            <h6>Note legali</h6>
            <ul>
              <li>
                <a href="#">Termini e condizioni</a>
              </li>
              <li>
                <a href="#">Informazioni sulla privacy</a>
              </li>
              <li>
                <a href="#">Cookies</a>
              </li>
            </ul>
          </div>
          <div id="arrow_up">
            <a href="#nav_guest"><i class="fas fa-arrow-circle-up"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style></style>
