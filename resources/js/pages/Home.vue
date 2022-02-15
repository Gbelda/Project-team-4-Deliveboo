<template>
  <div class="container">
    <div class="content">
      <div class="title m-b-md">Deliveboo</div>
      <em>Team 4</em>
      <hr />
      <em>Giovanni B. | Paolo P. | Giuseppe P. | Laurentiu C. | Marco C.</em>

      <br>
      <router-link to="/restaurants" class="btn btn-primary mt-5">Vedi tutti i nostri ristoranti</router-link>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang='scss'>
html,
body {
  background-color: #fff;
  color: #636b6f;
  font-family: "Nunito", sans-serif;
  font-weight: 200;
  height: 100vh;
  margin: 0;
}

.full-height {
  height: 100vh;
}

.flex-center {
  align-items: center;
  display: flex;
  justify-content: center;
}

.position-ref {
  position: relative;
}

.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.content {
  text-align: center;
}

.title {
  font-size: 84px;
}

.links > a {
  color: #636b6f;
  padding: 0 25px;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 0.1rem;
  text-decoration: none;
  text-transform: uppercase;
}

.m-b-md {
  margin-bottom: 30px;
}
</style>