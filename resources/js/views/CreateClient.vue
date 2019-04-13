<template>
  <div id="createClient" class="container">
    <h1>Registrar cliente</h1>
    <div class="row">
      <div class="col-md-9">
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" id="name" class="form-control" v-model="name" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" class="form-control" v-model="email" required>
        </div>

        <div class="form-group">
          <label for="phoneNumber">Teléfono</label>
          <input type="phone" id="phoneNumber" class="form-control" v-model="phoneNumber" required>
        </div>

        <div class="form-group">
          <label for="country">País</label>
          <select type="phone" id="country" class="form-control" v-model="country" required>
            <option v-for="country in countries" :value="country.id">{{ country.name }}</option>
          </select>
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
  name: 'CreateClient',
  data: function(){
    return {
      // Form content
      clients: [],
      platforms: [],
      developmentStatuses: [],
      paymentMethods: [],

      // Project data
      name: '',
      email: '',
      phoneNumber: '',
      country: ''
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
      data.append('email', this.email)
      data.append('phone_number', this.phoneNumber)
      data.append('country', this.country)

      this.lockForm()

      // axios.post('', data).then((response)=>{
      //   this.clearForm();
      //   console.log(response.data.data);
      // })
    },
    getFormContent(){
      axios.get('').then((response)=>{
        this.platforms = response.data.data
      })
    }
  }
}
</script>
