<template>
    <div class="home">
        <Nav/>
        <Board class="board"/>
    </div>
</template>

<script>
import Board from "@/components/home/Board";
import Nav from "@/components/template/Nav";
import { mapActions } from 'vuex'
import auth from '@/mixins/auth'

export default {
    name: 'Home',
    
    components: {
        Board,
        Nav 
    },
    
    created() {
        this.loadTasks()
        .then(() => {
            this.loadTaskTypes()
        })
    },
    
    mounted() {
        if(!auth.verifyAuth()) {
            this.$router.push('/')
        }
    },

    methods: {
        ...mapActions(['loadTasks', 'loadTaskTypes'])
    }
}
</script>

<style>
.board {
    padding-top: 8%;    
    padding-bottom: 8%;
}
</style>
