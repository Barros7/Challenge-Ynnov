import "bootstrap/dist/css/bootstrap.min.css"
import { createApp } from 'vue'
import App from './App.vue'

import VueGoogleMaps from '@fawmi/vue-google-maps'

const app = createApp(App);
app.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBKMqSak9V9hly7CvKD-skWhXkVbjW2M9E',
    },
}).mount('#app')
import "bootstrap/dist/js/bootstrap.js"

//https://www.google.com/maps/embed/v1/directions?key=AIzaSyBKMqSak9V9hly7CvKD-skWhXkVbjW2M9E&origin=US