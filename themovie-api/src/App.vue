<template>
    <div id='app' class="container-fluid">
        <Search />
    </div>
</template>
<script>
    import Search from './components/Search.vue';
    export default {
        name: 'App',
        components: {
            Search,
        }
    }
</script>