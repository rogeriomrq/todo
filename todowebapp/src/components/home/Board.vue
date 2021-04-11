<template>
    <section class="board">
        <stack 
            :key="taskType.type + '-' + changed"
            :task-type="taskType"
            v-for="taskType in taskTypes"
            @task-changed="changed++"
        />
    </section>
</template>

<script>
import Stack from "@/components/home/Stack";
import { mapState } from 'vuex';

export default {
    name: "Board",
    
    components: {Stack},
    
    data() {
        return {
            changed: 0
        }
    },
    
    computed: {
        ...mapState(['taskTypes']),
    },
}
</script>

<style scoped>
.board {
    display: flex;
    justify-content: space-evenly;
    background-color: #b7b7b7;
    height: 100%;
}
</style>