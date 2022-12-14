import "bootstrap/dist/css/bootstrap.min.css"
import { createApp } from 'vue'
import App from './App.vue'

import VueGoogleMaps from '@fawmi/vue-google-maps'

const app = createApp(App);
app.use(VueGoogleMaps, {
    load: {
        region: 'us',
        key: 'AIzaSyBqZ-4dF9WECmuV4Y4crOyzUFwt8G-9F30',
    },
}).mount('#app')
import "bootstrap/dist/js/bootstrap.js";

/*
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&region=GB&callback=initMap">
    </script>
*/
