require('./bootstrap');
window.Vue = require('vue');

import modalComponent from './components/modal.vue';
import modalAuth from './components/modalAuth.vue';

const app = new Vue({
    el: '#app',
    components: {
    	'modal-component' : modalComponent,
    	'modal-auth' : modalAuth
    },
    data: {
    	modalForm: {
    		content: '',
    		isActive: false
    	}
    },
    methods: {
    	toggleModal(target){
    		this.modalForm.content = target ? target.split(' ').join('') : '';
    		this.modalForm.isActive = !this.modalForm.isActive;
    	}
    }
});
