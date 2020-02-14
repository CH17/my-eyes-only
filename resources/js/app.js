require('./bootstrap');
import VueClipboard from 'vue-clipboard2';
import VueCountdownTimer from 'vuejs-countdown-timer'

window.Vue = require('vue');
Vue.use(VueClipboard);
Vue.use(VueCountdownTimer);


Vue.component('create-message', require('./components/message/CreateMessage.vue').default);
Vue.component('show-message', require('./components/message/ShowMessage.vue').default);

const app = new Vue({
    el: '#app',
});
