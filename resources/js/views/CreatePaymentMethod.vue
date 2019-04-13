<template>
  <div id="CreatePaymentMethod" class="container">
    <h1>Registrar método de pago</h1>
    <div class="row">
      <div class="col-md-9">
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
    </div>
  </div>
</template>

<script>
export default {
  name: 'CreatePaymentMethod',
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
    lockForm(){
      document.querySelectorAll('input, textarea, select').forEach((control)=>{
        control.setAttribute('readonly', true)
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
