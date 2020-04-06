require('./bootstrap');

window.Vue = require('vue');
import Vuelidate from 'vuelidate';
/**
 * Vue-snotify config
 */
import Snotify, {
    SnotifyPosition
} from 'vue-snotify'
const options = {
    toast: {
        position: SnotifyPosition.centerTop,
        showProgressBar: false,
        timeout: 3000,
    }
}
Vue.use(Snotify, options)
//end snotify
Vue.use(Vuelidate)

import Dashboard from "./components/Dashboard";

const app = new Vue({
    el: '#app',
    components:{ Dashboard }
});
 