<template>
  <div id="createProject" class="container">
    <h1>Crear proyecto</h1>
    <div class="row">
      <div class="col-md-9">
        <div class="row">
          <div class="form-group col-md-8">
            <label for="name">Nombre del proyecto</label>
            <input type="text" id="name" class="form-control" v-model="name" required>
          </div>
          <div class="form-group col">
            <label class="d-block">Plataforma</label>
            <div class="form-check form-check-inline" v-for="n in 3">
              <input type="checkbox" :id="'platform' + n" class="form-check-input" v-model="platformId" :value="n" required>
              <label :for="'platform' + n" class="form-check-label">{{ n }}</label>
            </div>
          </div>
        </div>

        <!-- Dates -->
        <div class="row">
          <div class="form-group col">
            <label for="startDate">Fecha de inicio</label>
            <input type="text" id="startDate" class="form-control" v-model="startDate" required>
          </div>
          <div class="form-group col">
            <label for="endDate">Fecha de cierre</label>
            <input type="text" id="endDate" class="form-control" v-model="endDate" required>
          </div>
        </div>

        <div class="form-group">
          <label class="d-block">Estado de desarrollo</label>
          <div class="form-check form-check-inline" v-for="n in 5">
            <input type="radio" name="developmentStatusId" :id="'developmentStatusId' + n" class="form-check-input" v-model="developmentStatusId" :value="n" required>
            <label :for="'developmentStatusId' + n" class="form-check-label">{{n }}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea rows="7" id="description" class="form-control" v-model="description" required></textarea>
        </div>

        <div class="row">
          <div class="form-group col-md-8">
            <label for="budget">Presupuesto</label>
            <input type="number" id="budget" class="form-control" v-model="budget" required>
          </div>
          <div class="form-group col-md-4">
            <label for="paymentMethodId">Método de pago</label>
            <select id="paymentMethodId" class="form-control" v-model="paymentMethodId" required>
              <option v-for="n in 4" :value="n">Payment method {{ n }}</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="clientId">Cliente</label>
          <select name="client_id" id="clientId" class="form-control" v-model="clientId">
            <option v-for="n in 10" :value="n">Client {{ n }}</option>
          </select>
        </div>

        <div class="form-group d-flex align-items-center">
          <button class="btn btn-secondary">Enviar</button>
          <a class="d-inline-block ml-auto" @click="clearForm">Reiniciar</a>
        </div>
      </div>
    </div>
  </div><!-- End App -->
</template>

<script>
export default {
  data: function(){
    return {
      // Form content
      clients: [],
      platforms: [],
      developmentStatuses: [],
      paymentMethods: [],

      // Project data
      name: '',
      startDate: '',
      endDate: '',
      description: '',
      budget: '',
      developmentStatusId: null,
      platformId: [],
      clientId: null,
      paymentMethodId: null
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
      data.append('start_date', this.startDate)
      data.append('end_date', this.endDate)
      data.append('description', this.description)
      data.append('budget', this.budget)
      data.append('payment_method_id', this.paymentMethodId)
      data.append('platform_id', this.platformId)
      data.append('development_status_id', this.developmentStatusId)
      data.append('client_id', this.clientId)

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

      axios.get('').then((response)=>{
        this.paymentMethods = response.data.data
      })

      axios.get('').then((response)=>{
        this.developmentStatuses = response.data.data
      })

      axios.get('').then((response)=>{
        this.clients = response.data.data
      })
    }
  }
}
</script>

<style lang="css" scoped>
</style>
