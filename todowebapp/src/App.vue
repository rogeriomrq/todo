<template>
    <div id="app">
        <router-view to="/"></router-view>
    </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    created() {
        this.initializeStore()
    },
    
    methods: {
        ...mapActions(['initializeStore'])
    },
}
</script>

<style>
html, body {
    margin: 0px;
    height: 100vh;
    width: 100%;
    display: flex;
}

#app {
    margin: 0px;
    min-height: 100%;
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    width: 100%;
}

.button {
    border: none;
    padding: 10px;
    border-radius: 6px;
    font-weight: bolder;
    cursor: pointer;
}

.button-primary {
    background-color: cadetblue;
    color: white;
}

.button-danger {
    background-color: #e26363;
    color: white;
}

.button-secondary {
    background-color: #406892;
    color: white;
}

.label-form {
    display: flex;
    justify-content: left;
}
.table-form {
    background-color: white;
    border-radius: 15px;
    width: 20%;
    min-height: 25%;
    padding: 5%;
}
.input-form {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: flex;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
}
</style>
