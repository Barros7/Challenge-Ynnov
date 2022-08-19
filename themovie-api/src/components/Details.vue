<template>
  <div class="container">
      <div class="row px-3">
        <div v-for='result in results' :key='result.id' class="card p-2 mx-2 my-4 col-4" style="width: 32%;">
          <img
              :src="`https://image.tmdb.org/t/p/w500${result.poster_path}`"
              :alt="result.title"
              :title="result.title"
              height="300"
              width="200"
              class="card-img-top"
              :loading=" index === 0 ? 'eager' : 'lazy'"
              draggable="false"
          />
          <div class="card-body text-white bg-dark">
            <h5 class="card-title">{{result.id}}</h5>
            <h5 class="card-title">{{result.title}}</h5>
            <p class="card-text">{{result.overview}}</p>
            <p>{{id}}</p>
            <button @click="this.id = result.id" class="btn btn-info">Assistir</button>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
  import axios from 'axios';
  const MY_KEY = '7ae0d6972de076eeac5a490626643a5f';
  const url = `https://api.themoviedb.org/3/tv/`;
  export default {
    name: 'MyDetails',
    data () {
      return {
        results: '',
        id: ''
      }
    },
    methods: {
      getResult() {
        let category = `${this.id}?api_key=${MY_KEY}&append_to_response=videos`;
        axios.get(url + category).then( response => { 
          this.results = response.data.results;
          console.log("######################### detais");
        })
          console.log("######################### detais");
      }
    }
  }
</script>
<style>
  label {
    color: aliceblue;
  }
</style>