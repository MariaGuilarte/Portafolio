<template>
  <div id="sidenav">
    <div class="sidenav-backlayer" :class="{'active':isActive}" @click="toggleSidenav()"></div>
    <div class="sidenav" :class="{'active':isActive}">
      <div class="sidenav-header">
        <div class="sidenav-logo">HERE GOES THE LOGO</div>
        <span class="sidenav-toggler" @click="toggleSidenav()"><i class="material-icons" style="font-size: 1em;">{{ isActive ? 'close' : 'menu' }}</i></span>
      </div>
      <ul class="sidenav-nav">
        <li>
          <router-link :to="{ name: 'CreateProject', params: {} }"><i class="material-icons">folder</i> PROYECTOS</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'CreateClient', params: {} }"><i class="material-icons">group</i> CLIENTES</a></router-link>
        </li>
        <li>
          <router-link :to="{ name: 'CreatePaymentMethod', params: {} }"><i class="material-icons">credit_card</i> MÉTODOS DE PAGO</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'CreatePlatform', params: {} }"><i class="material-icons">phonelink</i> PLATAFORMAS</router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Sidenav',
  props:['active'],
  computed:{
    isActive(){
      return this.active
    }
  },
  methods:{
    toggleSidenav(){
      document.querySelector('.sidenav-backlayer').classList.toggle('active');
      document.querySelector('.sidenav').classList.toggle('active');
      document.querySelector('body').classList.toggle('sidenav-active');

      this.active = !this.active;
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
.sidenav-nav li {
  border-bottom: 1px solid #dfdfdf;
}
.sidenav-nav li a {
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
</style>
