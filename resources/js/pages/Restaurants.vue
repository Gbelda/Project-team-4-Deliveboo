<template>
  <div class="container">
    <div class="main_header">
      <h1>Ristoranti</h1>
    </div>

    <div class="main_content d-flex">
      <div class="row justify-content-evenly col">
        <div class="empty d-flex align-items-center justify-content-center text-danger">
          <h3 v-if="restaurants == ''">
            Nessun ristorante disponibile
          </h3>
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
            <h5 class="card-title">{{ restaurant.restaurant_name }}</h5>
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
      </div>
      <nav class="col-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <h3 class="mt-2">Categories</h3>
          <div
            class="form-check"
            v-for="(category, index) in categories"
            :key="category.id"
          >
            <!-- <input class="form-check-input" type="checkbox" :value="category.id" :id="'category'+index" v-model="selected.categories">
                    <label class="form-check-label" :for="'category' + index">
                        {{ category.name }} 
                    </label> -->
            <button
              type="button"
              class="btn btn-link"
              @click="SelectCategory(category.id)"
              :id="'category' + index"
            >
              {{ category.name }}
            </button>
          </div>
        </div>
      </nav>
    </div>
    <!-- 
    <div class="links text-center mt-5">
      <span
        class="btn text-secondary"
        :class="meta.current_page === 1 ? 'disabled' : ''"
        @click="PrevPage()"
        >Prev</span
      >
      <span
        class="btn"
        :class="meta.current_page === page ? 'btn-primary' : 'btn-light'"
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
    </div> -->
  </div>
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
        categories: "",
      },
    };
  },
  methods: {
    GetRestaurants() {
      axios
        .get("/api/restaurants", {
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

    // NextPage() {
    //   if (this.meta.current_page !== this.meta.last_page) {
    //     this.GetRestaurants(this.links.next);
    //   }
    // },

    // PrevPage() {
    //   if (this.meta.current_page !== 1) {
    //     this.GetRestaurants(this.links.prev);
    //   }
    // },

    // ToPage(page) {
    //   this.GetRestaurants("/api/restaurants?page=" + page);
    // },

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
    this.GetRestaurants();
    this.GetCategories();
  },

  watch: {
    selected: {
      handler: function () {
        this.GetRestaurants();
      },
      deep: true,
    },
  },
};
</script>

<style lang='scss'>
.card {
  img {
    min-height: 245px;
  }
}
</style>