<template>
  <div class="container">
    <div class="main_header d-flex justify-content-between">
      <h3>{{ restaurant.restaurant_name }}</h3>

      <ul class="list-unstyled">
      <li class="nav-item dropdown">
        <a
          id="navbarDropdown1"
          class="nav-link dropdown-toggle"
          href="#"
          role="button"
          data-bs-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Carrello
        </a>

        <div
          class="dropdown-menu dropdown-menu-right"
          aria-labelledby="navbarDropdown"
        >
          <ul class="dropdown-item list-unstyled ">
            <li v-for="item in cart">
              {{ item.name }}
            </li>
          </ul>
        </div>
      </li>
      </ul>

    </div>

    <div class="row justify-content-evenly">
      <div
        class="card"
        style="width: 18rem"
        v-for="plate in plates"
        :key="plate.id"
      >
        <img :src="'/storage/' + plate.image" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title">{{ plate.name }}</h5>
          <p class="card-text">
            &euro; {{ plate.price }}
          </p>
          <button class="btn btn-primary" @click="AddToCart(plate)">
            Agiungi al carrello
          </button>
        </div>
      </div>
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

    AddToCart(plate) {
      this.cart.push(plate);
      // this.saveProduct();
      // console.log(this.cart);
    },
  },

  mounted() {
    this.GetRestaurant();

    this.GetPlates();

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