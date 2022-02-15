<template>
  <li class="nav-item dropdown">
    <a
      id="navbarDropdown1"
      class="nav-link dropdown-toggle"
      href="#"
      role="button"
      data-bs-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
      v-pre
    >
      Carrello
    </a>

    <div
      class="dropdown-menu dropdown-menu-right"
      aria-labelledby="navbarDropdown"
    >
      <ul class="dropdown-item">
        <li></li>
      </ul>
    </div>
  </li>
</template>

<script>
export default {
    props:{
        cart: Array,
    }
};
</script>

<style>
</style>