<template>
    <div class="container-fluid">
        <div v-if="toogle == false">
            <MySearch/>
        </div>
        <div v-else class="row cover" :style="{ backgroundImage: `url(https://image.tmdb.org/t/p/w500${details.backdrop_path})` }">
            <div class="mx-4 mt-3">
                <button v-on:click="toogle =! toogle">
                    Back
                </button>
            </div>
            <div class="row">
                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="embed-responsive embed-responsive-16by9 m-4">
                        <iframe class="embed-responsive-item" :src="`https://www.youtube.com/embed/${key_video}`" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="m-4 details">
                        <h1 class="details-bg px-3">{{details.original_title}}</h1>
                        <p class="details-bg px-3">Popularidade: {{details.popularity}}</p>
                        <p class="details-bg p-2">Idioma: {{language}} | País de origem: {{origin_country}}</p>
                        <div v-if="category==='tv'" class="row px-3">
                            <p class="details-bg px-3">Tempporadas: {{details.number_of_seasons}} | Episódios: {{details.number_of_episodes}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4 mx-4">
                    <MyDetails />
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <p class="description p-3 ms-4">{{details.overview}}</p>
                </div>
                <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mb-5">
                        <img
                            :src="`https://image.tmdb.org/t/p/w500${details.poster_path}`"
                            :alt="details.title"
                            :title="details.title"
                            height="300"
                            width="100%"
                            class="card-img-top"
                            :loading=" index === 0 ? 'eager' : 'lazy'"
                            draggable="false"
                        />  
                </div>
            </div>
            <div v-if="category==='tv'"  class="row px-3">
                <div v-for='serie in series' :key='serie.id' class="card p-2 my-4 col-12 col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                    <div class="card-body text-white bg-dark">
                        <img
                            :src="`https://image.tmdb.org/t/p/w500${serie.poster_path}`"
                            :alt="serie.name"
                            :title="serie.name"
                            height="300"
                            width="200"
                            class="card-img-top"
                            :loading=" index === 0 ? 'eager' : 'lazy'"
                            draggable="false"
                        />
                        <div class="card-body text-white bg-da${url}${this.category}/${this.id}?api_key=${MY_KEY}&append_to_response=videosrk">
                            <h1 class="card-title">{{serie.name}}</h1>
                            <h4 class="card-text">Temporada: {{serie.season_number}}</h4>
                            <h5 class="card-text">Episodios: {{serie.episode_count}}</h5>
                            <p class="card-text">Lançamento: {{serie.air_date}}</p>
                            <p class="card-text">{{serie.overview}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';
  import MySearch from './Search.vue';
  import MyDetails from './Details.vue';
  let MY_KEY = '7ae0d6972de076eeac5a490626643a5f';
  let Google_API_Key = 'AIzaSyBKMqSak9V9hly7CvKD-skWhXkVbjW2M9E';
  let url = `https://api.themoviedb.org/3/`;
  export default {
    name: "MyWatch",
    components: {
    MySearch,
    MyDetails
},
    props: {
        id: Number,
        category: String
    },
    data() {
        return {
            details: "",
            key_video: "",
            language: "",
            series: "",
            origin_country: '',
            toogle: true
        };
    },
    mounted() {
        axios.get(`${url}${this.category}/${this.id}?api_key=${MY_KEY}&append_to_response=videos`).then(response => {
            this.details = response.data;
            this.key_video = response.data.videos.results[0].key;
            this.language = response.data.spoken_languages[0].english_name;
            this.origin_country = response.data.origin_country[0];
            this.series = response.data.seasons;
        });

        axios.get(`https://maps.googleapis.com/maps/api/js?key=${Google_API_Key}&callback=initMap`).then(response => {
            this.details = response.data;
            console.log("#######################");
            console.log("#######################");
        });
    },
}
</script>
<style>
    iframe {
        width: 100%;
        height: 40vh;
        border-radius: 20px;
    }

    .details {
        color: #000000;
        font-size: 20px;
        font-weight: 900;
    }

    .details-bg {
        height: auto;
        width: 86%;
        background-color: rgb(168, 168, 39);
    }

    .cover {
        background-color: #cccccc;
        height: auto;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .description {
        height: auto;
        font-size: 30px;
        color: #ffffff;
        background-color: rgba(66, 39, 39, 0.795);
        border-radius: 10px;
    }

    img {
        background-color: #cccccc;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 500px;
        width: 100%;
        border: 10px solid rgb(46, 43, 43);
    }
</style>