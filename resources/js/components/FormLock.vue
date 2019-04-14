<template>
  <div :class="{'form-lock-overlay':true, 'active':lockedDown}"></div>
</template>

<script>
export default {
  name: 'FormLock',
  props:['lockedDown'],
  watch:{
    lockedDown(){
      document.querySelectorAll('input, textarea, select').forEach((control)=>{
        if( !this.lockedDown ){
          control.removeAttribute('readonly')
        }else{
          control.setAttribute('readonly', true)
        }
      })
    }
  }
}
</script>

<style>
  /* .form-lock-overlay {
    transition: all .4s;
    background: transparent;
    top: 0;
    left: 0;
    position: fixed;
    width: 100vw;
    height: 100vh;
    z-index: -100;
  }
  .form-lock-overlay.active {
    z-index: 300;
    background: rgba(0,0,0,.5);
  } */
</style>
