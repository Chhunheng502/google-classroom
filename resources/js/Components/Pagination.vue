<template>
    <div class="text-center">
        <v-pagination
            v-model="page"
            :length="15"
            :total-visible="7"
        ></v-pagination>
    </div>
</template>

<script>
export default {
    data: () => ({
        page: 1,
    }),
}
</script>