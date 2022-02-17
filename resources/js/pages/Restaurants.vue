<template>
    <div class="container-fluid jumbo p-0">
        <header class="d-flex justify-content-center">
            <div class="row container content justify-content-center flex-wrap">
                <div class="content-left col-12 col-md-6">
                    <h1>
                        Il cibo che ami
                        <span class="text-brand">quando</span> e
                        <span class="text-brand">dove</span> vuoi tu!
                    </h1>
                </div>
                <div class="content-right col-12 col-sm-6">
                    <img
                        class="img-fluid"
                        src="../../img/jumbo/ciclista-arancione.png"
                        alt="immagine artistica di un rider"
                    />
                </div>
            </div>
        </header>

        <!-- .larger_container -->
        <div class="larger_container container-fluid d-flex">
            <!-- .sidebar -->
            <aside class="sidebar d-flex col-2">
                <nav class="d-none d-md-block bg-light">
                    <div class="sidebar-sticky">
                        <h3 class="mt-2">Scegli la Categoria</h3>
                        <ul
                            class="form-check"
                            v-for="(category, index) in categories"
                            :key="category.id"
                        >
                            <!-- <input class="form-check-input" type="checkbox" :value="category.id" :id="'category'+index" v-model="selected.categories">
                    <label class="form-check-label" :for="'category' + index">
                        {{ category.name }} 
                    </label> -->
                            <li
                                type="button"
                                class="btn btn-link"
                                @click="SelectCategory(category.id)"
                                :id="'category' + index"
                            >
                                {{ category.name }}
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>
            <!-- /.sidebar -->

            <!-- .right_container -->
            <div class="right_container col-10">
                <!-- .best_restaurants_section -->
                <section class="best_restaurants_section">
                    <div class="paragraph_title">
                        <div class="row">
                            <div class="col-6">
                                <h2>
                                    I migliori ristoranti del mese di Milano
                                </h2>
                                <div class="horizontal_rule"></div>
                            </div>
                        </div>
                    </div>

                    <!-- #best_restaurants_carousel -->
                    <div
                        id="best_restaurants_carousel"
                        class="carousel slide"
                        data-bs-ride="carousel"
                    >
                        <div class="carousel-indicators">
                            <button
                                type="button"
                                data-bs-target="#best_restaurants_carousel"
                                data-bs-slide-to="0"
                                class="active"
                                aria-current="true"
                                aria-label="Slide 1"
                            ></button>
                            <button
                                type="button"
                                data-bs-target="#best_restaurants_carousel"
                                data-bs-slide-to="1"
                                aria-label="Slide 2"
                            ></button>
                            <button
                                type="button"
                                data-bs-target="#best_restaurants_carousel"
                                data-bs-slide-to="2"
                                aria-label="Slide 3"
                            ></button>
                        </div>
                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                                <svg
                                    class="bd-placeholder-img"
                                    width="100%"
                                    height="100%"
                                    xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice"
                                    focusable="false"
                                >
                                    <rect
                                        width="100%"
                                        height="100%"
                                        fill="#777"
                                    />
                                </svg>

                                <div class="container">
                                    <div class="carousel-caption text-start">
                                        <h3>da Marco</h3>
                                        <h6>
                                            La migliore pizza d'Italia... altro
                                            che Napoli
                                        </h6>
                                        <a
                                            class="btn btn-lg btn-primary"
                                            href="#"
                                        >
                                            Provala subito
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <svg
                                    class="bd-placeholder-img"
                                    width="100%"
                                    height="100%"
                                    xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice"
                                    focusable="false"
                                >
                                    <rect
                                        width="100%"
                                        height="100%"
                                        fill="#777"
                                    />
                                </svg>

                                <div class="container">
                                    <div class="carousel-caption">
                                        <h3>Da Giovanni</h3>
                                        <h6>
                                            Il miglior sushi di Milano l'ho
                                            facciamo solo noi!
                                        </h6>
                                        <button
                                            class="btn btn-lg btn-primary"
                                            href="#"
                                        >
                                            Provalo subito
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <svg
                                    class="bd-placeholder-img"
                                    width="100%"
                                    height="100%"
                                    xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true"
                                    preserveAspectRatio="xMidYMid slice"
                                    focusable="false"
                                >
                                    <rect
                                        width="100%"
                                        height="100%"
                                        fill="#777"
                                    />
                                </svg>

                                <div class="container">
                                    <div class="carousel-caption text-end">
                                        <h3>Da Paolo</h3>
                                        <h6>
                                            I migliori panini di Milano, buoni e
                                            poco costosi
                                        </h6>
                                        <button
                                            class="btn btn-lg btn-primary"
                                            href="#"
                                        >
                                            Provali subito
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#best_restaurants_carousel"
                            data-bs-slide="prev"
                        >
                            <span
                                class="carousel-control-prev-icon"
                                aria-hidden="true"
                            ></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#best_restaurants_carousel"
                            data-bs-slide="next"
                        >
                            <span
                                class="carousel-control-next-icon"
                                aria-hidden="true"
                            ></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <!-- /#best_restaurants_carousel -->
                </section>
                <!-- /.best_restaurants_section -->

                <!-- .main_content -->
                <section class="main_content d-flex justify-content-center">
                    <div class="row justify-content-evenly col">
                        <h2 class="text-center">Ristoranti filtrati</h2>
                        <div
                            class="empty d-flex align-items-center justify-content-center text-danger"
                        >
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
                                <h5 class="card-title">
                                    {{ restaurant.restaurant_name }}
                                </h5>
                                <p class="card-text">
                                    {{ restaurant.address }}
                                </p>
                                <small
                                    v-for="(
                                        category, index
                                    ) in restaurant.categories"
                                    :key="restaurant.slug + category.id"
                                >
                                    {{ category.name }}
                                    {{
                                        index !=
                                        restaurant.categories.length - 1
                                            ? "|"
                                            : ""
                                    }}
                                </small>
                                <br />
                                <router-link
                                    :to="'/restaurants/' + restaurant.id"
                                    class="btn btn-primary"
                                    >Vedi ristorante</router-link
                                >
                            </div>
                        </div>
                        <div
                            class="links text-center mt-5"
                            v-if="meta.last_page > 1"
                        >
                            <span
                                class="btn text-secondary"
                                :class="
                                    meta.current_page === 1 ? 'disabled' : ''
                                "
                                @click="PrevPage()"
                                >Prev</span
                            >
                            <span
                                class="btn"
                                :class="
                                    meta.current_page === page
                                        ? 'btn-primary'
                                        : 'btn-light'
                                "
                                v-for="page in meta.last_page"
                                :key="page"
                                @click="ToPage(page)"
                                >{{ page }}</span
                            >
                            <span
                                class="btn text-secondary"
                                :class="
                                    meta.current_page === meta.last_page
                                        ? 'disabled'
                                        : ''
                                "
                                @click="NextPage()"
                                >Next</span
                            >
                        </div>
                    </div>
                </section>
                <!-- /.main_content -->

                <!-- .best_plate_section -->
                <section class="best_plate_section rounded">
                    <div class="paragraph_plate_day">
                        <div class="row">
                            <div class="col-3">
                                <h2>Piatto del giorno</h2>
                                <div class="horizontal_rule"></div>
                            </div>
                        </div>
                    </div>
                    <div class="plate_of_day">
                        <img src="../../img/main/plate_of_day.png" alt="" />
                        <div class="plate_of_day_body">
                            <h4>Squisito hamburger menu, provalo subito!</h4>
                            <h6 id="title_h6">A soli 5,99 €</h6>
                            <button
                                class="btn btn-primary"
                                @click="AddToCart(plate)"
                            >
                                Aggiungi al carrello
                            </button>
                        </div>
                    </div>
                </section>
                <!-- .best_plate_section -->
            </div>
            <!-- /.right_container -->
        </div>
        <!-- /.larger_container -->
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

<style lang="scss">
.card {
    img {
        min-height: 245px;
    }
}
</style>
