<template>
    <!-- NOTE [use redis to record number of viewers and replies] -->
    <DashboardLayout>
        <template v-slot:header_title>
            Reports (for teacher only)
        </template>
        
        <template v-slot:content>
            <DiscussionControl></DiscussionControl>
            <PostCard></PostCard>
            <Pagination></Pagination>
        </template>
    </DashboardLayout>
</template>

<style>
.two-lines {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
  white-space: normal;
}
</style>

<script>
import DashboardLayout from '@/Layout/DashboardLayout'
import DiscussionControl from '@/Components/Discussion/Control'
import PostCard from '@/Components/Discussion/PostCard'
import Pagination from '@/Components/Pagination'

export default {
    components: {
        DashboardLayout,
        DiscussionControl,
        PostCard,
        Pagination
    },
}
</script>