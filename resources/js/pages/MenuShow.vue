<template>
  <div class="container">
    <div class="main_header d-flex justify-content-between">
      <h3>{{ restaurant.restaurant_name }}</h3>
    </div>

    <div class="main_content d-flex justify-content-center">
      <div class="row justify-content-center">
        <div
          class="card col-4 me-5 mb-5"
          style="width: 18rem"
          v-for="plate in plates"
          :key="plate.id"
        >
          <img
            :src="'/storage/' + plate.image"
            class="card-img-top"
            alt="..."
          />
          <div class="card-body">
            <h5 class="card-title">{{ plate.name }}</h5>
            <p class="card-text">
              &euro;
              {{
                Math.round((parseFloat(plate.price) + Number.EPSILON) * 100) /
                100
              }}
            </p>
            <button class="btn btn-primary" @click="AddToCart(plate)">
              Agiungi al carrello
            </button>
          </div>
        </div>
      </div>

      <nav class="col-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <h3 class="mt-2">Carrello</h3>
          <ul class="list-unstyled">
            <li v-for="(item, value) in counts" :key="value">
              {{ value }} : {{ item }}

              <br />
              <button class="btn btn-primary" @click="addQuantity(value)">
                aggiungi
              </button>
              <button class="btn btn-danger" @click="removeToCart(value)">
                elimina
              </button>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
import Vue from "vue";
export default {
  data() {
    return {
      restaurant: {},
      meta: {},
      links: {},
      plates: [],
      cart: [],
      counts: [],
      sampleArray: ["a", "a", "b", "c"],
    };
  },

  watch: {
    cart: {
      handler(product) {
        localStorage.cart = JSON.stringify(product);
      },
      deep: true,
    },
  },

  methods: {
    GetRestaurant() {
      axios.get("/api/restaurants/" + this.$route.params.id).then((resp) => {
        this.restaurant = resp.data.data;
      });
    },

    GetPlates() {
      axios.get("/api/plates/" + this.$route.params.id).then((resp) => {
        this.plates = resp.data.data;
      });
    },

    CountQuantity() {
      this.counts = this.cart.reduce(
        (acc, value) => ({
          ...acc,
          [value.name]: (acc[value.name] || 0) + 1,
        }),
        {}
      );
    },

    AddToCart(plate) {
      this.cart.push(plate);
      // this.saveProduct();
      // console.log(this.cart);
      this.CountQuantity();
    },

    addQuantity(input) {
      var result = this.cart.find(({ name }) => name === input);
      this.cart.push(result);
      this.CountQuantity();
    },

    removeToCart(input) {
      var result = this.cart.find(({ name }) => name === input);
      const index = this.cart.indexOf(result);
      if (index > -1) {
        this.cart.splice(index, 1);
      }
      this.CountQuantity();
    },
  },

  mounted() {
    this.GetRestaurant();

    this.GetPlates();
    if (this.cart != []) {
      setTimeout(this.CountQuantity, 500);
    }

    // if(localStorage.cart != undefined){
    //   this.cart = JSON.parse(localStorage.cart)
    // }

    if (localStorage.getItem("cart")) {
      try {
        this.cart = JSON.parse(localStorage.cart);
      } catch (e) {
        localStorage.removeItem("cart");
      }
    }
  },
};
</script>

<style>
</style>