<template>
  <div id="createProject">
    <h1>Crear proyecto</h1>

    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="form-group col">
            <label for="clientId">Cliente</label>
            <select name="client_id" id="clientId" class="form-control" v-model="project.clientId">
              <option v-for="client in clients" :value="client.id">{{ client.name }}</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="name">Nombre del proyecto</label>
            <input type="text" id="name" class="form-control" v-model="project.name" required>
          </div>
          <div class="col-md-6">
            <!-- Dates -->
            <div class="row">
              <div class="form-group col">
                <label for="startDate">Fecha de inicio</label>
                <datepicker :input-class="'form-control'" v-model="project.startDate" :language="es" required></datepicker>
              </div>
              <div class="form-group col">
                <label for="endDate">Fecha de cierre</label>
                <datepicker :input-class="'form-control'" v-model="project.endDate" :language="es" required></datepicker>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="d-block">Estado de desarrollo</label>
          <div class="form-check form-check-inline" v-for="developmentStatus in developmentStatuses">
            <input type="radio" :id="'developmentStatusId' + developmentStatus.id" class="form-check-input" v-model="project.developmentStatusId" :value="developmentStatus.id" required>
            <label :for="'developmentStatusId' + developmentStatus.id" class="form-check-label">{{ developmentStatus.name }}</label>
          </div>
        </div>

        <div class="form-group">
          <label for="description">Descripción</label>
          <textarea rows="6" id="description" class="form-control" v-model="project.description" required></textarea>
        </div>

        <div class="form-group d-flex flex-row align-items-start">
          <label class="mr-3"><b>Plataforma</b></label>
          <div class="form-check form-check-inline" v-for="platform in platforms">
            <input type="checkbox" :id="'platform' + platform.id" class="form-check-input" v-model="project.platformId" :value="platform.id" required>
            <label :for="'platform' + platform.id" class="form-check-label">{{ platform.name }}</label>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-8">
            <label for="budget">Presupuesto</label>
            <input type="number" id="budget" class="form-control" v-model="project.budget" required>
          </div>
          <div class="form-group col-md-4">
            <label for="paymentMethodId">Método de pago</label>
            <select id="paymentMethodId" class="form-control" v-model="project.paymentMethodId" required>
              <option v-for="paymentMethod in paymentMethods" :value="paymentMethod.id">{{ paymentMethod.name }}</option>
            </select>
          </div>
        </div>

        <div class="form-group d-flex align-items-center">
          <button class="btn btn-secondary" @click="storeProject">Enviar</button>
          <a class="d-inline-block ml-auto" @click="clearForm">Reiniciar</a>
        </div>
      </div>
    </div><!-- End Row -->
    <form-lock :lockedDown="formIsLocked"></form-lock>
  </div><!-- End App -->
</template>

<script>
import Datepicker from 'vuejs-datepicker'
import {es} from 'vuejs-datepicker/dist/locale'
import FormLock from '../components/FormLock'

export default {
  data: function(){
    return {
      es: es,
      formIsLocked: false,
      // Form content
      clients: [],
      platforms: [],
      developmentStatuses: [],
      paymentMethods: [],

      // Project data
      project: {
        name: '',
        startDate: new Date(),
        endDate: '',
        description: '',
        budget: '',
        developmentStatusId: null,
        platformId: [1],
        clientId: null,
        paymentMethodId: null
      }
    }
  },
  components: {Datepicker, FormLock},
  methods: {
    customFormatter(date) {
      return this.$moment(date).format('YYYY-MM-DD')
    },
    clearForm(){
      document.querySelectorAll('input, textarea, select').forEach((control)=>{
        control.value = ''
      })
    },
    lockForm(reverse){
      document.querySelectorAll('input, textarea, select').forEach((control)=>{
        if( !reverse ){
          control.removeAttribute('readonly')
        }else{
          control.setAttribute('readonly', true)
        }
      })
    },
    storeProject(){
      let data = new FormData()
      data.append('name', this.project.name)
      data.append('start_date', this.$moment( this.project.startDate ).format('YYYY-MM-DD') )
      data.append('end_date', this.$moment( this.project.endDate ).format('YYYY-MM-DD') )
      data.append('description', this.project.description)
      data.append('budget', this.project.budget)
      data.append('payment_method_id', this.project.paymentMethodId)
      data.append('platform_id', this.project.platformId)
      data.append('development_status_id', this.project.developmentStatusId)
      data.append('client_id', this.project.clientId)

      this.formIsLocked = true

      this.axios.post('/api/projects', data).then((response)=>{
        this.clearForm()
        this.formIsLocked = false
        this.$toaster.success('Proyecto creado exitosamente')
      })
    },
    getFormContent(){
      this.axios.get('/api/platforms').then((response)=>{
        this.platforms = response.data.data
        this.project.platformId.push( this.platforms[0].id )
      })

      this.axios.get('/api/paymentMethods').then((response)=>{
        this.paymentMethods = response.data.data
        this.project.paymentMethodId = this.paymentMethods[0].id
      })

      this.axios.get('/api/developmentStatuses').then((response)=>{
        this.developmentStatuses = response.data.data
        this.project.developmentStatusId = this.developmentStatuses[0].id
      })

      this.axios.get('/api/clients').then((response)=>{
        this.clients = response.data.data
        this.project.clientId = this.clients[0].id
      })
    }
  },
  mounted(){
    console.log('application mounted');
    this.getFormContent()
  }
}
</script>

<style>
.tabs {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-flow: row nowrap;
}
.tabs li {
  flex: 1;
  /* border-right: 1px solid #dfdfdf; */
}
.tabs li:last-child {
  border-right: none;
}
.tabs li.active {
  border-bottom: 3px solid #9f9f9f;
}
.tabs li a {
  padding: 10px 5px;
  text-align: center;
  display: block;
}
.user-avatar {
  width: 40px;
  height: 40px;
  margin-right: 15px;
  border-radius: 50%;
  /* background:gray; */
  display: inline-flex;
  flex-flow: column nowrap;
  text-align: center;
  justify-content: center;
  align-items: center;
  line-height: 40px;
  color: gray;
}
.user-avatar > i.material-icons {
  font-size: 2em !important;
}
.etiqueta {
  padding: 5px 12px;
  border-radius: 2px;
  font-size: 1em;
  background: #FF3547;
  color: #fff;
  display: inline-flex;
  flex: 0;
  flex-flow: row nowrap;
  align-items: center;
}
.etiqueta i.material-icons {
  font-size: 1.2em;
  margin: -1px 7px 0 0;
}
.card-header, .card-footer {
  background: #fff;
}
.client-info h4 {
  font-size: 1em;
  margin: 1px 0;
}
.card-header > div {
  flex: 1;
}
.client-info h4 > span {}
  </style>
