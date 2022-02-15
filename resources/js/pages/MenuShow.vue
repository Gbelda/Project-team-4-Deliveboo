<template>
  <div class="container">
    <div class="card-body">
      <h3>{{ restaurant.restaurant_name }}</h3>
    </div>

    <div class="row">

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
          {{ plate.price }}
        </p>
        <button class="btn btn-primary" @click="AddToCart(plate)">Agiungi al carrello</button>
      </div>
    </div>

    </div>
  </div>
</template>

<script>
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
  methods: {
    GetRestaurant() {
      axios.get("/api/restaurants/" + this.$route.params.id).then((resp) => {
        this.restaurant = resp.data.data;
      });
    },

      GetPlates() {
      axios.get("/api/plates").then((resp) => {
        this.plates = resp.data.data;
      });
    },

    AddToCart(plate){
      this.cart.push(plate)
      // this.saveProduct();
      console.log(this.cart);
    },

  },

  mounted() {
    this.GetRestaurant();

    this.GetPlates();
  },
};
</script>

<style>
</style>