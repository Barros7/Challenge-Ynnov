<template>
    <div id='app'>
        <Search />
        <Watch />
    </div>
</template>
<script>
    //import MyDetails from './components/Details.vue';
    import Search from './components/Search.vue';
    export default {
        name: 'App',
        components: {
            Search
        }
    }
</script>