import Vue from 'vue';
import Router from 'vue-router';
Vue.use(Router);

import assessment from './Components/assessment/assessment.vue'
import oralcommunication from './Components/oralcommunication/oralcommunication.vue'
const routes = [
    {
        path:'/assessment',
        component: assessment
    }
]

export default new Router({
    mode: 'history',
    routes
})