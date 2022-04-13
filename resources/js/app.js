require('./bootstrap')

import Vue from 'vue'
import vuetify from '@/vuetify'
import router from '@/router'
import store from "@/store/index";

import App from '@/Index.vue'
import DatetimePicker from 'vuetify-datetime-picker'
 
Vue.use(DatetimePicker)

new Vue({
  el: '#app',

  components: {
    'AppComponent': App
  },

  vuetify,
  router,
  store,
});
