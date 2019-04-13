<template>
  <div class="container" id="CreatePlatform">
    <h1>Registrar plataforma</h1>
    <div class="form-group">
      <label for="name">Nombre</label>
      <input type="text" id="name" class="form-control" v-model="name" required>
    </div>

    <div class="form-group">
      <label for="icon">Icono</label>
      <input type="text" id="icon" class="form-control" v-model="icon" required>
    </div>

    <div class="form-group d-flex align-items-center">
      <button class="btn btn-secondary">Enviar</button>
      <a class="d-inline-block ml-auto" @click="clearForm">Reiniciar</a>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CreatePlatform',
  data(){
    return {
      // Form content
      icons: [],

      // Platform data
      name: '',
      icon: ''
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
      data.append('icon', this.icon)

      this.lockForm()

      // axios.post('', data).then((response)=>{
      //   this.clearForm();
      //   console.log(response.data.data);
      // })
    },
    getFormContent(){
      axios.get('').then((response)=>{
        this.icons = response.data.data
      })
    }
  }
}
</script>

<style>
</style>
