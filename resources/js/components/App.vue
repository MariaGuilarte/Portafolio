<template>
  <div id="vue-app">
    <sidenav :active="false"></sidenav>
    <header></header>
    <router-view></router-view>
  </div>
</template>

<script>
import Sidenav from './Sidenav'

export default {
  data(){
    return {
      sidenavActive: true
    }
  },
  components:{Sidenav},
  methods:{},
  mounted() {}
}
</script>

<style>
body {
  font-size: 12px;
  font-family: Roboto;
  overflow: hidden;
  transition: all .4s;
}
body.sidenav-active {
  padding-left: 280px;
}
#app {
  height: 100vh;
  overflow: auto;
}
h1 {
  font-size: 2em;
  height: 70px;
  line-height: 70px;
  border-bottom: 1px solid #dfdfdf;
  margin-bottom: 15px;
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
