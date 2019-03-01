

require('./bootstrap');

window.Vue = require('vue');



//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('topo', require('./components/Topo.vue'));
Vue.component('painel', require('./components/Painel.vue'));
Vue.component('caixa', require('./components/Caixa.vue'));

const app = new Vue({
    el: '#app'
});
