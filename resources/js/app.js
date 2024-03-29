/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vuex from 'vuex'
 import Vue from 'vue'
 import vSelect from 'vue-select'

 require('./bootstrap');

 window.Vue = require('vue');

 Vue.use(Vuex);
 Vue.component('v-select', vSelect)
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pedido-cliente', require('./components/PedidoCliente.vue').default);
Vue.component('pedido', require('./components/Pedido.vue').default);
Vue.component('marmita', require('./components/Marmita.vue').default);
Vue.component('pedido-component', require('./components/PedidoComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const store = new Vuex.Store({
 	state: {
 		cliente:{
 			id:'',
 			endereco:{
 				logradouro:'',
 				numero:'',
 				bairro:{
 					id:'',
 					nome:''
 				},
 				referencia:'',
 				complemento:''
 			}
 		},
 		marmitas:[]
 	},
 	mutations:{
 		addMarmita(val){
 			this.state.marmitas.push(val);
 		},
 		setCliente(val){
 			this.state.cliente = val;
 		}
 	},
 	getters: {
 		cliente: state => state.cliente,
 		marmitas: state => state.marmitas
 	}
 })

 const app = new Vue({
 	el: '#app',
 	store
 });
