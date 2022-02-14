<template>
  <div class="container">
    <h1>Ristoranti</h1>

    <div class="card" style="width: 18rem" v-for="restaurant in restaurants" :key="restaurant.id">
      <img class="card-img-top" :src="'storage/' + restaurant.image" alt="Card image cap" />
      <div class="card-body">
        <h5 class="card-title">{{ restaurant.restaurant_name }}</h5>
        <p class="card-text">
            {{ restaurant.address }}
        </p>
          <router-link :to="'/restaurants/' + restaurant.id" class="btn btn-primary">Vedi ristorante</router-link>
      </div>
    </div>

        <div class="links text-center mt-5">
      <span class="btn text-secondary"  :class="meta.current_page === 1 ? 'disabled' : ''" @click="PrevPage()" >Prev</span>
      <span class="btn" :class="meta.current_page === page ? 'btn-primary' : 'btn-light'" v-for="page in meta.last_page" :key="page" @click="ToPage(page)">{{page}}</span>
      <span class="btn text-secondary" :class="meta.current_page === meta.last_page ? 'disabled' : ''" @click="NextPage()">Next</span>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      restaurants: [],
      meta: {},
      links: {},
    };
  },
  methods: {
    GetRestaurants(url) {
      axios.get(url)
        .then((response) => {
          // console.log(response);
          this.restaurants = response.data.data;
          this.meta = response.data.meta;
          this.links = response.data.links;
        })
        .catch((error) => error);
    },

        NextPage(){
      if (this.meta.current_page !== this.meta.last_page) {
        this.GetRestaurants(this.links.next)
      }
    },

    PrevPage(){
      if (this.meta.current_page !== 1) {
        this.GetRestaurants(this.links.prev)
      }
    },

    ToPage(page){
      this.GetRestaurants('/api/restaurants?page=' + page)
    }
  },
    mounted() {
    this.GetRestaurants("/api/restaurants");
  },
};
</script>

<style>
</style>