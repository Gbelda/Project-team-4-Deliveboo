<template>
  <section id="home">
    <div class="container">
      <!-- titolo paragrafo categorie -->
      <div class="title_parag">
        <h2 class="title">
          <strong> SCEGLI COSA VUOI MANGIARE </strong>
        </h2>
        <div class="line"></div>
      </div>
      <!-- contenuto categorie !ATTENZIONE!DA FARE RESPONSIVE -->
      <div class="background_cat categorie">
        <!--ciclo categorie -->
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
      </div>
      <!-- ristoranti -->
      <section class="ristoranti_container">
        <div class="content">
          <!-- titolo -->
          <h2 class="text-center">Ristoranti filtrati</h2>
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
          <div class="row justify-content-center">
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
                    v-for="(category, index) in restaurant.categories"
                    :key="restaurant.slug + category.id"
                  >
                    {{ category.name }}
                    {{ index != restaurant.categories.length - 1 ? "|" : "" }}
                  </div>
                  <div class="food-card-about">
                    {{ restaurant.address }}
                    <div class="about-shadow"></div>
                  </div>
                  <div class="food-card-food-properties">
                    <!-- routerlink -->
                    <router-link
                      :to="'/restaurants/' + restaurant.id"
                      id="router_ristoranti"
                      ><strong>VEDI RISTORANTE</strong></router-link
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- gestione pagine -->
          <div class="links text-center mt-5" v-if="meta.last_page > 1">
            <span
              class="btn prev"
              :class="meta.current_page === 1 ? 'disabled' : ''"
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
              :class="meta.current_page === meta.last_page ? 'disabled' : ''"
              @click="NextPage()"
              >Next</span
            >
          </div>
        </div>
      </section>
    </div>
  </section>
</template>

<script>
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
  methods: {
    GetRestaurants(url) {
      axios
        .get(url, {
          params: this.selected,
        })
        .then((response) => {
          // console.log(response);
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
      height: 1rem;
      border-radius: 20px;
      width: calc(100% / 11);
      .colonna {
        align-items: center;
        margin-left: -1.25rem;
      }
      .check_square {
        border: none;
        background: transparent;
        &:focus {
          background-color: $brand-color;
          box-shadow: none;
        }
        &:checked {
          background-color: $brand-color;
          padding-right: 2rem;
        }
      }
    }
    .icon_cat {
      width: 3rem;
      &:hover {
        cursor: pointer;
        transform: scale(120%);
        transition: 0.3s;
      }
    }
  }
  // main ristoranti
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
    bottom: -25%;
    transform: translate(-50%, -105%);
    z-index: 7;
    border-radius: 15px;
    padding: 10px 15px;
    color: $black;
    text-align: center;
    background: $brand-color;
    width: fit-content;
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

// utility
.title_parag {
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