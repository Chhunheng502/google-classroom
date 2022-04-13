<template>
    <DashboardLayout>
        <template v-slot:header_title>
            (Discussion Detail)
        </template>
        
        <template v-slot:content>
            <PostCard :isDetail="true"></PostCard>
            <v-divider></v-divider>
            <CommentControl></CommentControl>
            <CommentContainer :requiredTitle="false"></CommentContainer>
        </template>
    </DashboardLayout>
</template>

<script>
import DashboardLayout from '@/Layout/DashboardLayout'
import PostCard from '@/Components/Discussion/PostCard'
import CommentControl from '@/Components/Comment/Control'
import CommentContainer from '@/Components/Comment/Container'

export default {
    components: {
        DashboardLayout,
        PostCard,
        CommentControl,
        CommentContainer
    }
}
</script>