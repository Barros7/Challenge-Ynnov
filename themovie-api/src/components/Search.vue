<template>
  <div class="container">
    <header class="bg-dark">
      <nav class="navbar navbar-dark bg-dark p-4">
        <a class="navbar-brand">Consumo API TMDB</a>
        <div class="form-check form-check-inline">
          <input v-model="category"  class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="movie">
          <label class="form-check-label" for="inlineRadio1">Filmes</label>
        </div>
        <div class="form-check form-check-inline">
          <input v-model="category" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="tv">
          <label class="form-check-label" for="inlineRadio2">Séries</label>
        </div>        
          <div>
            <input v-model='query' @keyup='getResult(query)' class="form-control me-2" type="search" placeholder="Pesquisar filme ou serie" aria-label="Search">
          </div>
      </nav>
    </header>
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
          <button @click="this.id = result.id">Assistir</button>
        </div>
      </div>
    </div>
    <Watch :id="id" :category="category"/>
  </div>
</template>

<script>
  import axios from 'axios';
  import Watch from './Watch.vue';
  const MY_KEY = '7ae0d6972de076eeac5a490626643a5f';
  const url = `https://api.themoviedb.org/3/search/`;
  export default {
    name: 'MySearch',
    components: {
      Watch
    },
    data () {
      return {
        query: '',
        category: '',
        results: '',
        id: 576
      }
    },
    methods: {
      getResult(query) {
        let category = `${this.category}?api_key=${MY_KEY}&query=`;
        axios.get(url + category + query).then( response => { 
          this.results = response.data.results;
          console.log("#########################");
        })
      }
    }
  }
</script>
<style>
  label {
    color: aliceblue;
  }
</style>