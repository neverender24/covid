require('./bootstrap');

window.Vue = require('vue');

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

import Dashboard from "./components/Dashboard";

const app = new Vue({
    el: '#app',
    components:{ Dashboard }
});
 