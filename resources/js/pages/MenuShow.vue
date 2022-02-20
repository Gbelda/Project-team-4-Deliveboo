<template>
  <div class="">
    <div class="hero_img"></div>
    <div class="container" id="menu">
      <section class="plates row">
        <!-- colonna piatti -->
        <div class="col-10">
          <!-- nome ristorante -->
          <div class="title_parag">
            <h2 class="title">
              <strong>{{ restaurant.restaurant_name }}</strong>
            </h2>
            <div class="line"></div>
          </div>
          <!-- contenuto piatti -->
          <div class="row justify-content-center contenitore_bordi">
            <div
              class="col-md-6 col-lg-4 col-sm-12 card-container d-flex"
              v-for="plate in plates"
              :key="plate.id"
            >
              <div class="food-card">
                <div class="food-card-image">
                  <img :src="'/storage/' + plate.image" />
                </div>
                <div class="food-card-content">
                  <div class="food-card-food-name">
                    <h1>
                      <strong>{{ plate.name }}</strong>
                    </h1>
                  </div>
                  <div class="food-card-artist-name">
                    &euro;
                    {{
                      Math.round(
                        (parseFloat(plate.price) + Number.EPSILON) * 100
                      ) / 100
                    }}
                  </div>
                  <div class="food-card-about">
                    {{ plate.description }}
                    <div class="about-shadow"></div>
                  </div>
                  <div
                    class="food-card-food-properties"
                    @click="AddToCart(plate)"
                  >
                    <!-- routerlink -->
                    Aggiungi al carrello
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- carrello -->
        <div class="col-2 side-cart">
          <div class="sidebar-sticky carrello">
            <h3>Carrello</h3>
            <div class="isEmpty text-center" v-if="cart==''">
              <em class="text-danger">Il carrello e vuoto</em>
            </div>
            <ul class="list-unstyled contenitore_piatti_carrello">
              <li
                class="name_food"
                v-for="(item, value) in counts"
                :key="value"
              >
                <div class="name_qty d-flex justify-content-between">
                  <div>{{ value }}:</div>
                  <div class="qty_plate">
                    {{ item }}
                  </div>
                </div>
                <button class="btn add_btn" @click="addQuantity(value)">
                  aggiungi
                </button>
                <button class="btn remove_btn" @click="removeToCart(value)">
                  elimina
                </button>
              </li>
            </ul>
            <div class="text-center" v-if="cart != ''">
              <button class="btn btn-success" type="submit" @click="getUrl()">
                Procedi all'ordine
              </button>
            </div>
          </div>
        </div>
      </section>
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
      this.cart.sort((a,b) => parseFloat(a.price) - parseFloat(b.price))
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

    getUrl() {
      console.log(window.location.href);
      window.location.href = "/checkout";
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

<style lang="scss">
// VARIABILI
$brand-color: #ff8200;
$secondary_color: #ffc100;
$black: #0a0903;
.hero_img {
  background-image: url("../../img/jumbo/hero_img.jpg");
  height: 400px;
  background-repeat: no-repeat;
  background-size: cover;
}

#menu {
  padding-top: 4rem;
  .qty_plate {
    height: 1.5rem;
    width: 1.5rem;
    border-radius: 50%;
    background: $brand-color;
    vertical-align: middle;
    text-align: center;
    line-height: 1.5rem;
    color: $black;
  }

  .carrello {
    padding: 2rem 0;
    h3 {
      text-align: center;
      font-weight: bolder;
    }
    .contenitore_piatti_carrello {
      display: flex;
      flex-direction: column;
      align-items: center;
      .name_qty {
        padding: 0.5rem 0;
      }
      .name_food {
        font-size: bold;
      }
      .add_btn {
        background-color: $brand-color;
        color: $black;
      }
      .remove_btn {
        background-color: $black;
        color: $brand-color;
      }
    }
  }
}
// card
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
  height: 2.5rem;
  position: absolute;
  font-size: 12px;
  font-family: "Montserrat", sans-serif;
  opacity: 0.56;
  overflow: auto;
  top: 73%;
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
// utility
.title_parag {
  text-align: center;
  padding: 2rem 0;
  .line {
    height: 3px;
    background-color: $black;
    width: 20%;
    margin: auto;
  }
}
</style>