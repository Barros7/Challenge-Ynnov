<template>
<div class="container-fluid">
    <div class="row cover" :style="{ backgroundImage: `url(https://image.tmdb.org/t/p/w500${details.backdrop_path})` }">
        <div class="row">
            <div class="col-4">
                <div class="embed-responsive embed-responsive-16by9 m-4">
                    <iframe class="embed-responsive-item" :src="`https://www.youtube.com/embed/${key_video}`" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-8">
                <div class="m-4 details">
                    <h1 class="details-bg px-3">{{details.original_title}}</h1>
                    <p class="details-bg px-3">{{details.popularity}}:</p>
                    <p class="details-bg px-3">{{language}}</p>
                    <p class="details-bg px-3">{{id}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <p class="description p-3 ms-4">{{details.overview}}</p>
            </div>
                <div class="col-4">
                    <img
                        :src="`https://image.tmdb.org/t/p/w500${details.poster_path}`"
                        :alt="details.title"
                        :title="details.title"
                        height="300"
                        width="200"
                        class="card-img-top"
                        :loading=" index === 0 ? 'eager' : 'lazy'"
                        draggable="false"
                    />  
                </div>
        </div>
    </div>
</div>
</template>
<script>
    import axios from 'axios';
    let MY_KEY = '7ae0d6972de076eeac5a490626643a5f';
    let url = `https://api.themoviedb.org/3/movie/`;

  export default {
    name: 'MyWatch',
    props: {
        id: Number
    },
    data () { 
        return {
            details: '',
            key_video: '',
            language: '',
            idT: this.id
      }
    },
      created() {
        
        console.log("######### Yheaaaab",this.id)
        axios.get(`${url}${this.id}?api_key=${MY_KEY}&append_to_response=videos`).then( response => { 
            this.details = response.data;
            this.key_video = response.data.videos.results[0].key;
            this.language = response.data.spoken_languages[0].english_name;

            console.log("#######################");
        })
      }
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
        height: 500px;
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
        border: 10px solid rgb(46, 43, 43);
    }
</style>