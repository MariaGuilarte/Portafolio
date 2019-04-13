<template>
  <div id="vue-app">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="#">Portfolio</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'CreateProject', params: {} }">Crear Proyecto</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'CreateClient', params: {} }">Registrar Cliente</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'CreatePaymentMethod', params: {} }">Métodos de pago</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'CreatePlatform', params: {} }">Plataformas</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link" :to="{ name: 'CreateDevelopmentStatus', params: {} }">Estados de desarrollo</router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log('Component mounted.')
  }
}
</script>

<style>
body {
  font-size: 12px;
  font-family: Roboto;
}
h1 {
  font-size: 2em;
}
h2 {
  font-size: 1.5em;
}
h3 {
  font-size: 1.25em;
}
.btn {
  border-radius: 2px;
  border: none;
  font-size: 1em;
  text-transform: uppercase;
}
a {
  text-decoration: none;
  font-size: 1em;
  text-transform: uppercase;
  color: blue;
  cursor: pointer;
}

</style>
