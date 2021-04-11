<template>
    <section 
        class="task" 
        v-on:dragstart="drag(data.id)"
    >   
        <div class="task-close">
            <button 
                class="button"
                @click="tryToDeleteTask"
            >X</button>
        </div>
        <div class="task-title">
            {{data.title}}
        </div>
        <div class="task-description">
            {{data.description}}
        </div>
    </section>
</template>

<script>
import { mapActions } from 'vuex'

export default {
    name: "Task",
    
    props: {
        data: {
            type: Object
        }
    },
   
    methods: {
        ...mapActions(['deleteTask', 'setDragging']),
        
        drag(taskId) {
            this.setDragging(taskId)
        },
        
        tryToDeleteTask() {
            this.deleteTask(this.data.id)
        },
    }
}
</script>

<style scoped>
.button {
    height: 10px;
    width: 10px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 10px;
    background-color: #e26363;
    color: white;
    float: right;
    margin: 1%;
}

.task {
    background-color: white;
    border-radius: 5px;
    padding-bottom: 15%;
    margin-top: 2%;
    cursor: grab;
}

.task-description {
    display: block;
    font-size: 12px;
    width: 100%;
}

.task-title {
    padding-top: 15%;
    display: block;
    width: 100%;
    justify-content: left;
}
</style>