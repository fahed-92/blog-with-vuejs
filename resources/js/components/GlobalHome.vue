<template>
    <div>

        <router-view :key="$route.fullPath"></router-view>

    </div>
</template>

<script>
export default {
    mounted() {
        // console.log('Component mounted.')
    },

}
</script>
