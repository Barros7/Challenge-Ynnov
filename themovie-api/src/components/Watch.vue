<template>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
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