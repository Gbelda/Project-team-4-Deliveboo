<template>
  <div class="container-fluid jumbo p-0">
    <header id="liftoff" class="d-flex justify-content-center">
      <div class="row container content justify-content-center flex-wrap">
        <div class="content-left col-12 col-md-6">
          <h1 class="title">
            Il cibo che ami
            <span class="text-brand">quando</span> e
            <span class="text-brand">dove</span> vuoi tu!
          </h1>
        </div>
        <div class="content-right col-12 col-sm-6">
          <img
            class="img-fluid"
            src="../../img/jumbo/ciclista-arancione.png"
            alt="immagine artistica di un rider"
          />
        </div>
      </div>
    </header>

    <!-- .best_restaurants_section -->
    <section class="best_restaurants_section container my-5">
      <div class="paragraph_title">
        <div class="row">
          <div class="col-12 text-center">
            <h2>I migliori ristoranti del mese a Milano</h2>
            <div class="horizontal_rule"></div>
          </div>
        </div>
      </div>

      <!-- #best_restaurants_carousel -->
      <div
        id="best_restaurants_carousel"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#best_restaurants_carousel"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#best_restaurants_carousel"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#best_restaurants_carousel"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
          <button
            type="button"
            data-bs-target="#best_restaurants_carousel"
            data-bs-slide-to="3"
            aria-label="Slide 4"
          ></button>
          <button
            type="button"
            data-bs-target="#best_restaurants_carousel"
            data-bs-slide-to="4"
            aria-label="Slide 5"
          ></button>
        </div>
        <div class="carousel-inner rounded-pill">
          <div id="da_marco" class="carousel-item active">
            <svg
              class="bd-placeholder-img"
              width="100%"
              height="100%"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              preserveAspectRatio="xMidYMid slice"
              focusable="false"
            ></svg>

            <div class="container">
              <div class="carousel-caption text-center">
                <h2 class="h2_carousel">Da Marco</h2>
                <h3 class="h3_carousel">La migliore pizza d'Italia</h3>
                <router-link :to="'/restaurants/da_marco'" class="btn btn-sm">
                  Provala subito</router-link
                >
              </div>
            </div>
          </div>
          <div id="da_giovanni" class="carousel-item">
            <svg
              class="bd-placeholder-img"
              width="100%"
              height="100%"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              preserveAspectRatio="xMidYMid slice"
              focusable="false"
            ></svg>

            <div class="container">
              <div class="carousel-caption">
                <h2 class="h2_carousel">Da Giovanni</h2>
                <h3 class="h3_carousel">Il miglior sushi di Milano</h3>
                <button class="btn btn-sm" href="#">Provalo subito</button>
              </div>
            </div>
          </div>
          <div id="da_paolo" class="carousel-item">
            <svg
              class="bd-placeholder-img"
              width="100%"
              height="100%"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              preserveAspectRatio="xMidYMid slice"
              focusable="false"
            ></svg>

            <div class="container">
              <div class="carousel-caption text-center">
                <h2 class="h2_carousel">Da Paolo</h2>
                <h3 class="h3_carousel">
                  Un vero fast-food americano al centro di Milano!
                </h3>
                <button class="btn btn-sm" href="#">Provalo subito</button>
              </div>
            </div>
          </div>
          <div id="da_laurentiu" class="carousel-item">
            <svg
              class="bd-placeholder-img"
              width="100%"
              height="100%"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              preserveAspectRatio="xMidYMid slice"
              focusable="false"
            ></svg>

            <div class="container">
              <div class="carousel-caption text-center">
                <h2 class="h2_carousel">Da Laurentiu</h2>
                <h3 class="h3_carousel">Tutta la cucina orientale che vuoi</h3>
                <button class="btn btn-sm" href="#">Provala subito</button>
              </div>
            </div>
          </div>
          <div id="da_giuseppe" class="carousel-item">
            <svg
              class="bd-placeholder-img"
              width="100%"
              height="100%"
              xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true"
              preserveAspectRatio="xMidYMid slice"
              focusable="false"
            ></svg>

            <div class="container">
              <div class="carousel-caption text-center">
                <h2 class="h2_carousel">Da Giuseppe</h2>
                <h3 class="h3_carousel">
                  La migliore cucina messicana di Milano
                </h3>
                <button class="btn btn-sm" href="#">Provala subito</button>
              </div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#best_restaurants_carousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#best_restaurants_carousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- /#best_restaurants_carousel -->
    </section>
    <!-- /.best_restaurants_section -->

    <!-- restuarants -->
    <section id="home">
      <div class="container">
        <!-- titolo paragrafo categorie -->
        <div class="title_paragraph">
          <h2 class="">
            <strong> SCEGLI COSA VUOI MANGIARE </strong>
          </h2>
          <div class="line"></div>
        </div>
        <!-- contenuto categorie !ATTENZIONE!DA FARE RESPONSIVE -->
        <div class="background_cat categorie">
          <!-- ciclo categorie -->
          <div
            class="form-check orange_band"
            v-for="(category, index) in categories"
            :key="category.id"
          >
            <input
              class="form-check-input check_square"
              type="checkbox"
              :value="category.id"
              :id="'category' + index"
              v-model="selected.categories"
            />
            <div class="content_check">
              <i class="far fa-check-circle"></i>
            </div>
            <div class="d-flex flex-column colonna">
              <label class="cat_image" :for="'category' + index">
                <img
                  class="icon_cat"
                  :src="'../../img/icon/' + category.image"
                  alt=""
                />
              </label>
              <label class="form-check-label fw-bold" :for="'category' + index">
                {{ category.name }}
              </label>
            </div>
          </div>
          <!-- /ciclo categorie -->
        </div>

        <!-- ristoranti -->
        <section class="ristoranti_container">
          <div class="content">
            <!-- titolo -->
            <h2 class="text-center pb-2">I Nostri Ristoranti</h2>
            <!-- in caso di nessun risultato -->
            <div
              class="
                empty
                d-flex
                align-items-center
                justify-content-center
                text-danger
              "
            >
              <h3 v-if="restaurants == ''">Nessun ristorante disponibile</h3>
            </div>
            <div class="row justify-content-center contenitore_bordi rounded">
              <div
                class="col-md-6 col-lg-4 col-sm-12 card-container d-flex"
                v-for="restaurant in restaurants"
                :key="restaurant.id"
              >
                <div class="food-card">
                  <div class="food-card-image">
                    <img :src="'storage/' + restaurant.image" />
                  </div>
                  <div class="food-card-content">
                    <div class="food-card-food-name">
                      <h1>
                        <strong>{{ restaurant.restaurant_name }}</strong>
                      </h1>
                    </div>
                    <div
                      class="food-card-artist-name"
                    >
                    <span
                    v-for="(category, index) in restaurant.categories"
                      :key="restaurant.slug + category.id">
                      {{ category.name }}
                      {{ index != restaurant.categories.length - 1 ? "|" : "" }}
                    </span>
                    </div>
                    <div class="food-card-about">
                      {{ restaurant.address }}
                      <div class="about-shadow"></div>
                    </div>
                    <div class="food-card-food-properties">
                      <!-- routerlink -->
                      <router-link
                        :to="'/restaurants/' + restaurant.slug"
                        id="router_ristoranti"
                        ><strong>VEDI RISTORANTE</strong></router-link
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- pagination -->
            <div class="pagination links" v-if="meta.last_page > 1">
              <span
                class="btn prev"
                v-if="meta.current_page > 1 ? 'disabled' : ''"
                @click="PrevPage()"
                >Prev</span
              >
              <span
                class="btn current"
                :class="meta.current_page === page ? 'current' : 'current-off'"
                v-for="page in meta.last_page"
                :key="page"
                @click="ToPage(page)"
                >{{ page }}</span
              >
              <span
                class="btn next"
                v-if="meta.current_page < meta.last_page ? 'disabled' : ''"
                @click="NextPage()"
                >Next</span
              >
            </div>
            <!-- /pagination -->
          </div>
        </section>
      </div>
    </section>
    <!-- restuarants -->
    <section class="py-3" id="infografica">
      <div class="title_info text-center">
        <h1>Perchè <span class="brand-color">DeliveBoo</span>?</h1>
        <div class="line"></div>
      </div>
      <div class="d-flex g-3">
        <div class="col-lg-4 d-flex flex-column align-items-center">
          <h2>SENZA INQUINARE</h2>
          <p>
            Teniamo all'ambiente, per questo le nostre consegne sono
            Free-pollution in quanto utilizziamo solo veicoli elettrici.
          </p>
          <img src="../../img/infografica/world.png" alt="" />
        </div>
        <div class="col-lg-4 d-flex flex-column align-items-center king">
          <h2>SOLO I MIGLIORI</h2>
          <p>
            Selezioniamo personalmente solo i migliori ristoranti di Milano
            attraverso i nostri test.
          </p>
          <img src="../../img/infografica/re.png" alt="" />
        </div>
        <div class="col-lg-4 d-flex flex-column align-items-center">
          <h2>PRECISIONE</h2>
          <p>
            Siamo sicuri delle nostre tempistiche, se entro 30 min dall'orario
            indicato non avrai il tuo ordine sarai rimborsato.
          </p>
          <img src="../../img/infografica/clessidra.png" alt="" />
        </div>
      </div>
    </section>
    <Footer></Footer>
  </div>
</template>

<script>
import Footer from "../components/Footer.vue";
export default {
  data() {
    return {
      categories: [],
      restaurants: [],
      meta: {},
      links: {},
      selected: {
        categories: [],
      },
    };
  },

  components: {
    Footer,
  },
  methods: {
    GetRestaurants(url) {
      axios
        .get(url, {
          params: this.selected,
        })
        .then((response) => {
          this.restaurants = response.data.data;
          this.meta = response.data.meta;
          this.links = response.data.links;
        })
        .catch((error) => error);
    },

    NextPage() {
      if (this.meta.current_page !== this.meta.last_page) {
        this.GetRestaurants(this.links.next);
        console.log("cliccato");
      }
    },

    PrevPage() {
      if (this.meta.current_page !== 1) {
        this.GetRestaurants(this.links.prev);
      }
    },

    ToPage(page) {
      this.GetRestaurants("/api/restaurants?page=" + page);
    },

    GetCategories() {
      axios
        .get("/api/categories", {
          params: _.omit(this.selected, "categories"),
        })
        .then((resp) => {
          this.categories = resp.data.data;
        })
        .catch((error) => error);
    },

    SelectCategory(category) {
      this.selected.categories = category;
    },
  },

  mounted() {
    this.GetRestaurants("/api/restaurants");
    this.GetCategories();
  },

  watch: {
    selected: {
      handler: function () {
        this.GetRestaurants("/api/restaurants");
      },
      deep: true,
    },
  },
};
</script>

<style lang="scss">
.card {
  img {
    min-height: 245px;
  }
}
// VARIABILI
$brand-color: #ff8200;
$secondary_color: #ffc100;
$black: #0a0903;

// home
#home {
  // categorie
  .background_cat {
    padding: 1rem 0;
    margin: 1rem 0;
    margin-bottom: 4rem;
    display: flex;
    justify-content: center;
    .orange_band {
      background-color: $secondary-color;
      margin: 0.5rem;
      //height: 1rem;
      border-radius: 20px;
      width: calc(100% / 11);
      .form-check-input {
        margin-left: -1em;
        &:hover {
          cursor: pointer;
        }
      }
      .colonna {
        align-items: center;
        //margin-left: -1.25rem;
        margin-left: -1rem;
        &:focus .content_check {
          display: block;
        }
      }
       .check_square {
                    border: none;
                    &:focus {
                        box-shadow: none;
                    }
                    &:checked {
                        background-color: $brand-color;
                    }
       }
      .content_check {
        display: none;
      }
      .icon_cat {
        width: 3rem;
        &:hover {
          cursor: pointer;
        }
        &:hover {
          cursor: pointer;
          transform: scale(120%);
          transition: 0.3s;
        }
      }
    }
  }
  // main ristoranti

  .contenitore_bordi {
    border-top: 2px solid $secondary-color;
    border-bottom: 2px solid $secondary-color;
  }
  #router_ristoranti {
    text-decoration: none;
    color: $black;
  }
  .food-card:hover {
    transform: scale(105%);
    transition: all 0.3s ease-in-out;
  }
  .food-card-food-properties:hover {
    box-shadow: 1px 3px 3px 0px $black;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
  }
  .prev {
    color: $black !important;
  }
  .current {
    background-color: $brand-color;
  }
  .next {
    color: $brand-color;
    font-weight: bold;
  }
  .current-off {
    background-color: transparent;
  }
  // mpostazioni card
  .food-card {
    position: relative;
    width: 400px;
    height: 350px;
    background: transparent;
    font-family: "Montserrat", sans-serif;
  }
  .food-card-image {
    position: relative;
    top: 20%;
    left: 5%;
    width: 40%;
    height: 40%;
    border-radius: 5px;
    overflow: hidden;
    background: #ffffff45;
    box-shadow: -4px 9px 13px 1px #00000045;
    z-index: 5;
  }
  .food-card-image > img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 100%;
    width: auto;
  }
  .food-card-content {
    position: absolute;
    bottom: 20%;
    right: 0;
    width: 80%;
    height: 70%;
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 5px 5px 10px 2px #00000045;
    background: $secondary_color;
  }
  .food-card-food-name,
  .food-card-artist-name {
    position: relative;
    left: 30%;
    color: $black;
    padding-left: 5px;
    font-size: 100%;
  }
  .food-card-artist-name {
    letter-spacing: 2px;
    width: 80%;
  }
  .food-card-food-name > * {
    margin-top: 32px;
    text-overflow: ellipsis;
    font-size: 1.5rem;
    width: 176px;
  }
  .food-card-about {
    width: 87%;
    position: absolute;
    font-size: 12px;
    font-family: "Montserrat", sans-serif;
    opacity: 0.56;
    top: 77%;
  }
  .about-shadow {
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 35px;
    z-index: 2;
  }
  .food-card-food-properties {
    position: absolute;
    left: 65%;
    //bottom: -25%;
    bottom: -20%;
    transform: translate(-50%, -105%);
    z-index: 101;
    border-radius: 15px;
    //padding: 10px 15px;
    padding: 5px 10px;
    color: $black;
    text-align: center;
    background: $brand-color;
    //width: fit-content;
    width: inherit;
    box-shadow: 2px 4px 12px 0px #00000045;
  }
  .food-card-food-properties > div {
    border-right: 1px solid var(--card-properties-text-color);
    width: fit-content;
    padding: 0 10px;
    display: inline-block;
  }
  .food-card-food-properties > div:last-child {
    border-right: none;
  }
  .food-card-food-properties > div > i {
    font-size: 16px;
    margin-bottom: 5px;
  }
  .food-card-food-properties > div > p {
    font-size: 10px;
    margin: 0;
  }
}

#infografica {
  .title_info {
    margin: 5rem 0;
    h1 {
      font-size: 3rem;
    }
    .line {
      width: 20%;
      background: $brand-color;
      height: 0.15rem;
      border-radius: 20px;
      margin: auto;
    }
    .brand-color {
      color: $brand-color;
    }
  }
  .row {
    justify-content: center;
  }
  .king {
    border-left: 2px solid #ff8200;
    border-right: 2px solid #ff8200;
  }
  h2 {
    color: $brand-color;
    font-weight: bold;
  }
  p {
    width: 60%;
    text-align: center;
    padding-bottom: 1rem;
    color: $black;
    font-weight: 800;
  }
  img {
    width: 50%;
  }
}

// utility
.title_paragraph {
  text-align: center;
  padding-top: 2rem;
  .line {
    height: 3px;
    background-color: $black;
    width: 20%;
    margin: auto;
  }
}
</style>