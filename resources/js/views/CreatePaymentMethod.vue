<template>
  <div id="CreatePaymentMethod">
    <h1>Registrar método de pago</h1>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" id="name" class="form-control" v-model="name" required>
    </div>
    <div class="form-group">
      <label for="url">URL</label>
      <input type="url" id="url" class="form-control" v-model="url" required>
    </div>
    <div class="form-group">
      <label class="d-block" for="logo">Logo</label>
      <input type="text" id="logo" class="form-control" v-model="logo" required>
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
  name: 'CreatePaymentMethod',
  components: { FormLock },
  data(){
    return {
      name: '',
      url: '',
      logo: null
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
      data.append('url', this.url)
      data.append('logo', this.logo)

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
