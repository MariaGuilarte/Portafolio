<template>
  <div id="nav">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">Portfolio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <router-link class="nav-link" :to="{ name: 'CreateProject' }">Crear Proyecto</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'CreateClient' }">Registrar Cliente</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'CreatePaymentMethod' }">Métodos de pago</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'CreatePlatform' }">Plataformas</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" :to="{ name: 'CreateDevelopmentStatus' }">Estados de desarrollo</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'VueNav'
}
</script>

<style>
</style>
