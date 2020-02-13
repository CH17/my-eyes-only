require('./bootstrap');
import VueClipboard from 'vue-clipboard2';

window.Vue = require('vue');
Vue.use(VueClipboard);


Vue.component('create-message', require('./components/message/CreateMessage.vue').default);
Vue.component('show-message', require('./components/message/ShowMessage.vue').default);

const app = new Vue({
    el: '#app',
});
