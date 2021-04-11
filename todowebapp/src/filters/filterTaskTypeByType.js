export default function(tasksTypes, type) {
    return tasksTypes.filter(item => item.type === type)
}