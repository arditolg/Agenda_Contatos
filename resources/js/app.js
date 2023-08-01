import './bootstrap';
import Vue from 'vue';
import ContactForm from './components/ContactForm.vue';
import ContactList from './components/ContactList.vue';

Vue.component('contact-form', ContactForm);
Vue.component('contact-list', ContactList);

const app = new Vue({
  el: '#app'
});

