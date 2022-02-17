<template>
  <section id="home">
    <!-- titolo paragrafo categorie -->
    <div class="title_parag">
      <h2 class="title">
          <strong>
            SCEGLI COSA VUOI MANGIARE
          </strong>
      </h2>
      <div class="line"></div>
    </div>
    <!-- contenuto categorie -->
      <div class="container-fluid background_cat">
        <div class="container categorie"> 
          <!--ciclo categorie -->
           <div
              class="form-check"
              v-for="(category, index) in categories"
              :key="category.id"
            >
              <input
                class="form-check-input"
                type="checkbox"
                :value="category.id"
                :id="'category' + index"
                v-model="selected.categories"
              />
              <label class="form-check-label" :for="'category' + index">
                {{ category.name }}
              </label>
           </div>
        </div>
      </div>
      <!-- ristoranti -->
       <section class="main_content d-flex justify-content-center ">
          <div class="row justify-content-evenly col">
            <h2 class="text-center">Ristoranti filtrati</h2>
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

            <div
              class="card col-4 mb-3"
              style="width: 18rem"
              v-for="restaurant in restaurants"
              :key="restaurant.id"
            >
              <img
                class="card-img-top"
                :src="'storage/' + restaurant.image"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">
                  {{ restaurant.restaurant_name }}
                </h5>
                <p class="card-text">
                  {{ restaurant.address }}
                </p>
                <small
                  v-for="(category, index) in restaurant.categories"
                  :key="restaurant.slug + category.id"
                >
                  {{ category.name }}
                  {{ index != restaurant.categories.length - 1 ? "|" : "" }}
                </small>
                <br />
                <router-link
                  :to="'/restaurants/' + restaurant.id"
                  class="btn btn-primary"
                  >Vedi ristorante</router-link
                >
              </div>
            </div>
            <div class="links text-center mt-5" v-if="meta.last_page > 1">
              <span
                class="btn text-secondary"
                :class="meta.current_page === 1 ? 'disabled' : ''"
                @click="PrevPage()"
                >Prev</span
              >
              <span
                class="btn"
                :class="
                  meta.current_page === page ? 'btn-primary' : 'btn-light'
                "
                v-for="page in meta.last_page"
                :key="page"
                @click="ToPage(page)"
                >{{ page }}</span
              >
              <span
                class="btn text-secondary"
                :class="meta.current_page === meta.last_page ? 'disabled' : ''"
                @click="NextPage()"
                >Next</span
              >
            </div>
          </div>
        </section>
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
    #home{
      // categorie
      .background_cat{
        background-color: $secondary-color;
        padding: 1rem 0;
        margin: 1rem 0;
        .categorie{
          display: flex;
          justify-content: center;
        }
      }
    }

    // utility
    .title_parag{
      text-align: center;
      .line{
        height: 3px;
        background-color: $black;
        width: 20%;
        margin: auto;
      }
    }
</style>