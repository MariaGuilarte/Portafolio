<template>
  <div id="CreateDevelopmentStatus">
    <h1>Registrar estado de desarrollo</h1>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" id="name" class="form-control" v-model="name" required>
    </div>

    <div class="form-group d-flex align-items-center">
      <button class="btn btn-secondary">Enviar</button>
      <a class="d-inline-block ml-auto" @click="clearForm">Reiniciar</a>
    </div>
  </div>
</template>

<script>
import FormLock from '../components/FormLock'

export default {
  name: 'CreateDevelopmentStatus',
  components: { FormLock },
  data(){
    return {
      // developmentStatus data
      name: ''
    }
  },
  methods: {
    clearForm(){
      document.querySelectorAll('input, textarea, select').forEach((control)=>{
        control.value = ''
      })
    },
    storeProject(){
      let data = new FormData()
      data.append('name', this.name)

      this.lockForm()

      // axios.post('', data).then((response)=>{
      //   this.clearForm();
      //   console.log(response.data.data);
      // })
    }
  }
}
</script>

<style>
</style>
