<template>
  <div class="">
    <div class="hero_img"></div>
    <div class="container" id="menu">
      <section class="plates row">
        <!-- colonna piatti -->
        <div class="col-lg-10 col-md-10 col-sm-12">
          <!-- nome ristorante -->
          <div class="titolo_menu">
            <h1>
              <strong>
                <span>{{ restaurant.restaurant_name.toUpperCase() }}</span>
              </strong>
            </h1>
            <!-- <div class="line"></div> -->
          </div>

          <!-- contenuto piatti -->
          <div class="container_food row py-5 gy-5">
            <div
              class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center"
              v-for="plate in plates"
              :key="plate.id"
            >
              <div
                class="
                  card_plates
                  d-flex
                  flex-column
                  align-items-center
                  text-center
                "
              >
                <div class="food_image">
                  <div class="relative_container">
                    <img :src="'/storage/' + plate.image" alt="" />
                  </div>
                </div>
                <div class="food_name">
                  <h2>
                    <strong>{{ plate.name }}</strong>
                  </h2>
                </div>
                <div class="food_description">
                  <p>
                    {{ plate.description }}
                  </p>
                </div>
                <div class="food_price">
                  &euro;
                  {{
                    Math.round(
                      (parseFloat(plate.price) + Number.EPSILON) * 100
                    ) / 100
                  }}
                </div>
                <div class="cart_button" @click="AddToCart(plate)">
                  <i class="fas fa-cart-plus"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- carrello -->
        <div class="col-lg-2 col-md-2 col-sm-12">
          <div class="sidebar-sticky carrello">
            <h3>Carrello</h3>
            <div class="isempty text-center " v-if="this.cart == ''">
              <em class="text-danger"
                >Il carrello &eacute; vuoto</em
              >
            </div>
            <ul class="list-unstyled contenitore_piatti_carrello">
              <li
                class="name_food"
                v-for="(item, value) in counts"
                :key="value"
              >
                <div class="name_qty d-flex justify-content-between">
                  <h6>
                    <strong>{{ value }}</strong>
                  </h6>
                  <h6>qty.</h6>
                </div>
                <div class="qty_plate d-flex justify-content-between">
                  <div class="button">
                    <button class="btn remove_btn" @click="removeToCart(value)">
                      <i class="fa-solid fa-minus"></i>
                    </button>
                    <button class="btn add_btn" @click="addQuantity(value)">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                  </div>
                  <div class="quantity">
                    {{ item }}
                  </div>
                </div>
              </li>
            </ul>
            <div
              class="qty_plate d-flex justify-content-evenly text-center"
              v-if="this.cart != ''"
            >
              <button class="btn remove_btn" @click="removeToCart(value)">
                <i class="fa-solid fa-trash-can"></i>
              </button>
              <button class="btn add_btn" @click="getUrl()">
                <i class="fa-solid fa-money-check-dollar"></i>
              </button>
            </div>
          </div>
        </div>
      </section>

      <div class="main_content d-flex justify-content-center">
        <nav class="col-2 d-none d-md-block bg-light sidebar"></nav>
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
      counts: [],
    };
  },

  watch: {
    cart: {
      handler(product) {
        localStorage.cart = JSON.stringify(product);
      },
      deep: true,
    },
    restaurant: {
      handler(restaurant) {
        localStorage.restaurant = JSON.stringify(restaurant);
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
      if (this.cart != "") {
        if (this.cart[0]["user_id"] != plate["user_id"] && this.cart != 0) {
          return $("#change_cart").modal("show");
        }
      }
      this.cart.push(plate);
      this.cart.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
      this.CountQuantity();
    },

    newOrder() {
      this.cart = [];
      this.counts = [];
      // this.cart.push(plate);
      // this.cart.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
      // this.CountQuantity();
      $("#change_cart").modal("hide");
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

    if (localStorage.getItem("cart")) {
      try {
        this.cart = JSON.parse(localStorage.cart);
      } catch (e) {
        localStorage.removeItem("cart");
      }
    }

    if (localStorage.getItem("restaurant")) {
      try {
        this.restaurant = JSON.parse(localStorage.restaurant);
      } catch (e) {
        localStorage.removeItem("restaurant");
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
  background-image: url("../../img/jumbo/menu_jumbo5.png");
  height: 400px;
  background-repeat: no-repeat;
  background-size: cover;
}

#menu {
  padding-top: 4rem;
  .titolo_menu {
    background: $secondary-color;
    transform: skewX(3deg);
    width: 60%;
    box-shadow: -7px 5px 0px 0px $black;
    padding: 0.2rem;
    border-radius: 10px;
    span {
      color: $black;
      padding-left: 1rem;
    }
    .line {
      height: 3px;
      background-color: $black;
      width: 40%;
    }
  }
  .quantity {
    color: $brand-color;
    font-size: 1.5rem;
    font-weight: bolder;
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
      .name_qty {
        padding: 0.5rem 0;
      }
      .name_food {
        font-size: bold;
        padding-bottom: 1rem;
        border-bottom: 1px solid black;
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
// card food
.card_plates {
  background-color: $secondary_color;
  transform: skewX(3deg);
  border-radius: 10px;
  min-height: 23rem;
  padding: 2rem 1rem;
  box-shadow: -11px 10px 0px 0px $black;
  width: 90%;
  max-height: 23rem;
  max-width: 18rem;
  &:hover {
    box-shadow: -11px 10px 0px 0px $brand-color;
    transition: all 0.3s ease-in-out;
  }
}
.food_image {
  width: 100%;
  padding-bottom: 1.5rem;
}
.food_name {
  max-height: 3.5rem;
  overflow: hidden;
}
.relative_container {
  position: relative;
  background-color: $brand-color;
  border-radius: 10px;
  width: 80%;
  margin: auto;
  height: 10rem;
  box-shadow: 4px 4px 7px 0px black;
}
.relative_container img {
  width: 85%;
  position: absolute;
  top: -1rem;
  left: 7%;
  max-width: 13rem;
}
.cart_button {
  position: absolute;
  bottom: -1.3rem;
  background: #ff8200;
  height: 2.5rem;
  width: 2.5rem;
  border-radius: 50%;
  line-height: 2.5rem;
  font-size: 1.2rem;
  &:hover {
    cursor: pointer;
    transform: scale(110%);
    transition: all 0.1s ease-in-out;
  }
}
.food_description {
  max-height: 3rem;
  min-height: 3rem;
  overflow: hidden;
  margin-bottom: 0.7rem;
}

.food_price {
  font-weight: bolder;
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