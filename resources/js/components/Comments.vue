<template>
    <div class="container">
        <ul class="comment-list">
            <comment
                v-for="comment in comments"
                :comment="comment"
                :key="comment.id"
            ></comment>
        </ul>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Comment from './Comment';

export default {
    name: 'Comments',
    components: {
        comment: Comment
    },
    computed: {
        ...mapGetters([
            'comments'
        ])
    },
    mounted() {
        this.$store.dispatch('GET_COMMENTS');

        Pusher.logToConsole = true;

        let pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
            cluster: process.env.MIX_PUSHER_APP_CLUSTER,
            encrypted: false
        });

        let channel = pusher.subscribe('comment-channel');

        channel.bind('new-comment', (data) => {
            this.$store.commit('ADD_COMMENT', data.comment);
        });
    },
}
</script>

<style>
    .comment-list {
        padding: 1em 0;
        margin-bottom: 15px;
    }
</style>
