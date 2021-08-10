require('./bootstrap')
window.Vue = require('vue');
Vue.component('index-component', require('./components/IndexComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('table-component', require('./components/TableComponent.vue').default);
const app = new Vue({
    el: '#app',
});