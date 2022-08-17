<template>
  <div class="container">
    <header class="bg-dark">
      <nav class="navbar navbar-dark bg-dark p-4">
      <a class="navbar-brand">Consumo API TMDB</a>
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
          <h5 class="card-title">{{result.title}}</h5>
          <p class="card-text">{{result.overview}}</p>
          <a :to="`/movie/${result.id}`" class="btn btn-primary">Assistir</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';
  const MY_KEY = '7ae0d6972de076eeac5a490626643a5f';
  const url = `https://api.themoviedb.org/3/search/multi?api_key=${MY_KEY}&query=`;

  export default {
    name: 'MySearch',
    data () {
      return {
      query: '',
      results: ''
      }
    },
    methods: {
      getResult(query) {
      axios.get(url + query).then(response => { this.results = response.data.results })
        console.log(this.results);
      }
    }
  }
</script>