import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import moment from 'moment'
import VueMoment from 'vue-moment'

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'

Vue.use( VueRouter )
Vue.use( VueAxios, axios )
Vue.use( Toaster, {timeout: 5000} )
Vue.use( VueMoment,  moment )

// views
import App from './components/App'
import CreateClient from './views/CreateClient'
import CreatePaymentMethod from './views/CreatePaymentMethod'
import CreatePlatform from './views/CreatePlatform'
import CreateDevelopmentStatus from './views/CreateDevelopmentStatus'
import CreateProject from './views/CreateProject'
import ListProjects from './views/ListProjects'

const router = new VueRouter({
  routes:[
    {
      name: 'CreateClient',
      path: '/clients/create',
      component: CreateClient
    },
    {
      name: 'ListProjects',
      path: '/projects',
      component: ListProjects
    },
    {
      name: 'CreateProject',
      path: '/',
      component: CreateProject
    },
    {
      name: 'CreatePaymentMethod',
      path: '/payment-methods/create',
      component: CreatePaymentMethod
    },
    {
      name: 'CreatePlatform',
      path: '/platforms/create',
      component: CreatePlatform
    },
    {
      name: 'CreateDevelopmentStatus',
      path: '/development-statuses/create',
      component: CreateDevelopmentStatus
    }
  ]
});

const app = new Vue({
  el: '#app',
  router,
  components: {App}
});
