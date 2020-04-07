require('./bootstrap');

window.Vue = require('vue');
Vue.component('categoria', require('./components/Categoria.vue').default);
Vue.component('articulo', require('./components/Articulo.vue').default);

const app = new Vue({
    el: '#app',
    data :{
      menu : 0
    }
});
