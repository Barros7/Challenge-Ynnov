<template>
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
</template>
<script>

/* Em testessssssssss */
  import axios from 'axios';
  const MY_KEY = '7ae0d6972de076eeac5a490626643a5f';
  const id_movie = 80;
  const url = `https://api.themoviedb.org/3/movie/${id_movie}?api_key=${MY_KEY}&append_to_response=query`;

  export default {
    name: 'MyDetails',
    data () {
      return {
      query: '',
      results: ''
      }
    },
    methods: {
      created() {
      axios.get(url + query).then(response => { this.results = response.data.results })
        console.log(this.results);
      }
    }
  }
</script>