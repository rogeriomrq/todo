export default function(tasks, taskTypeId) {
    return tasks.filter(item => item.task_type_id === taskTypeId)
}