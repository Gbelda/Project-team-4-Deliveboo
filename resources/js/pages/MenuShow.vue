<template>
  <div>
    <img :src="'/storage/' + restaurant.image" alt />
    <div class="card-body">
      <h3>{{ restaurant.restaurant_name }}</h3>
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
    };
  },
  methods:{
    GetRestaurant(){
      axios.get("/api/restaurants/" + this.$route.params.id).then(resp => {
        console.log(resp.data.data);
        this.restaurant = resp.data.data;
      });
    }
  },
  mounted() {
    this.GetRestaurant();
  },
}
</script>

<style>

</style>