<template>
    <section 
        class="stack"
        :type="taskType.type"
        v-on:drop="drop" 
        v-on:dragover="allowDrop"
    >
        <div class="stack-title">
            {{taskType.type}}
        </div>
        
        <Task 
            :data="task"
            draggable="true"
            :key="task.id + '-' + task.task_type_id"
            v-for="task in getTasks"
        />
    </section>
</template>

<script>
import Task from "@/components/home/Task";
import { mapActions, mapState } from 'vuex'
import filterTaskByTaskType from "@/filters/filterTaskByTaskType";

export default {
    name: "Stack",
    
    components: {Task},
        
    props: {
        taskType: {
            type: Object
        }
    },
    
    computed: {
        ...mapState([
            'dragging',
            'tasks',
            'taskTypes'
        ]),
            
        getTasks() {
            return filterTaskByTaskType(this.tasks, this.taskType.id)
        }
    },
    
    methods: {
        ...mapActions(['updateTask']),
        
        allowDrop($event) {
            $event.preventDefault();
        },
        
        drop() {
            let task = this.getTaskById(this.dragging)
            task.task_type_id = this.taskType.id
            this.updateTask(task)
            this.$emit('task-changed')
        },
        
        getTaskById(id) {
            return this.tasks.find(task => task.id === id)
        },
    },
}
</script>

<style scoped>

.stack {
    background-color: #cbcbcb;
    min-height: 500px;
    width: 15%;
    padding: 3px;
    border-radius: 15px;
}

.stack-title {
    padding: 2%;
    color: #373737;
}

</style>