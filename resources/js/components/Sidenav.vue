<template>
  <div id="sidenav">
    <div :class="{'active':isActive, 'sidenav-backlayer':true}" @click="toggleSidenav"></div>
    <div :class="{'active':isActive, 'sidenav':true}">
      <div class="sidenav-header">
        <div class="sidenav-logo">PROJECTMAN</div>
        <span class="sidenav-toggler" @click="toggleSidenav()"><i class="material-icons" style="font-size: 1em;">{{ isActive ? 'close' : 'menu' }}</i></span>
      </div>
      <ul class="sidenav-nav">
        <li @click="toggleSidenav" class="drop">
          <a @click:prevent=""><i class="material-icons">folder</i> PROYECTOS</a>
          <ul>
            <li><router-link :to="{ name: 'CreateProject' }">Crear proyecto</router-link></li>
            <li><router-link :to="{ name: 'ListProjects' }">Ver todos</router-link></li>
          </ul>
        </li>
        <li @click="toggleSidenav" class="drop">
          <a @click:prevent=""><i class="material-icons">group</i> CLIENTES</a>
          <ul>
            <li><router-link :to="{ name: 'CreateClient' }">Registrar cliente</router-link></li>
            <li><router-link :to="{ name: 'CreateClient' }">Ver todos</a></router-link></li>
          </ul>
        </li>
        <li @click="toggleSidenav">
          <router-link :to="{ name: 'CreatePaymentMethod' }"><i class="material-icons">credit_card</i> MÉTODOS DE PAGO</router-link>
        </li>
        <li @click="toggleSidenav">
          <router-link :to="{ name: 'CreatePlatform' }"><i class="material-icons">phonelink</i> PLATAFORMAS</router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Sidenav',
  props:['active'],
  data(){
    return {
      'activeNav':this.active
    }
  },
  computed:{
    isActive(){
      return this.activeNav
    }
  },
  methods:{
    toggleSidenav(){
      document.querySelector('body').classList.toggle('sidenav-active');
      this.activeNav = !this.activeNav;
    }
  },
  mounted(){
    if( this.isActive ){
      document.querySelector('body').classList.add('sidenav-active')
    }
  }
}
</script>

<style>
body {
  padding-left: 69px;
}
.sidenav {
  transition: all .4s;
  display: block;
  width: 280px;
  position: fixed;
  left: -215px;
  top: 0;
  height: 100vh;
  background: #fff;
  box-shadow: 0 2px 15px 2px rgba(0,0,0,.090);
  z-index: 100;
}
.sidenav.active {
  left: 0px;
}
.sidenav-backlayer {
  transition: all .4s;
  display: none;
}
.sidenav-backlayer.active {
  display: block;
  width: 100vw;
  position: absolute;
  left: 0;
  top: 0;
  height: 100vh;
  background: rgba(255,255,255,.8);
  z-index: 50;
}
.sidenav-header{
  border-bottom: 1px solid #dfdfdf;
  padding: 0 15px;
  height: 70px;
  line-height: 70px;
  display: flex;
  flex-flow: row nowrap;
}
.sidenav-toggler {
  display: inline-block;
  margin-left: auto;
  cursor: pointer;
  font-size: 1.5em;
  width: 70px;
  text-align: center;
  margin-right: -15px;
}
.sidenav-nav {
  list-style-type: none;
  display: flex;
  flex-flow: column nowrap;
  margin: 0;
  padding: 0;
}
.sidenav-nav > li {
  /* border-bottom: 1px solid #dfdfdf; */
}
.sidenav-nav > .drop ul {
  /* border-bottom: 1px solid #dfdfdf; */
  background: rgba(0,0,0,.025);
  list-style-type: none;
}
.sidenav-nav .drop ul li a {
  /* border-bottom: 1px solid #dfdfdf; */
  padding: 7px 20px;
  font-size: .9em;
}

.sidenav-nav > li a {
  display: flex;
  flex-flow: row nowrap;
  align-items: center;
  padding: 15px 20px;
  color: #000;
  text-decoration: none;
}
.sidenav-nav li a .material-icons {
  margin-right: 15px;
}
@media(min-width: 992px){
  body.sidenav-active {
    padding-left: 280px;
  }
}
</style>
