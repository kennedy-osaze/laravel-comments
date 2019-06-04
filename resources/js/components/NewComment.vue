<template>
    <div id="comment-form" class="box has-shadow has-background-white">
        <form @keyup.enter="postComment">
            <div class="field has-margin-top">
                <label for="author" class="label">Your name</label>
                <div class="control">
                    <input type="text" id="author" placeholder="Your name" class="input is-medium" v-model="comment.author">
                </div>
            </div>

            <div class="field has-margin-top">
                <label for="content" class="label">Your comment</label>
                <div class="control">
                    <textarea id="content" style="height:100px" class="input is-medium" autocomplete="true" v-model="comment.content" placeholder="Lorem ipsum"></textarea>
                </div>
            </div>

            <div class="control has-margin-top">
                <button type="submit" style="background-color: #47b784" :class="{ 'is-loading': submitted }" class="button has-shadow is-medium has-text-white" :disabled="!isValid" @click.prevent="postComment">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: 'NewComment',
    data() {
        return {
            comment: {
                author: '',
                content: '',
            },
            submitted: false,
        }
    },
    computed: {
        isValid() {
            return this.comment.author !== '' && this.comment.content !== '';
        }
    },
    methods: {
        postComment() {
            this.submitted = true;

            this.$store.dispatch('ADD_COMMENT', this.comment)
                .then(response => {
                    this.submitted = false;
                }).catch(error => {
                    this.submitted = false;

                    console.error(error);
                });
        }
    }
}
</script>

<style>
    .has-margin-top {
        margin-top: 15px;
    }

    form {
        margin-bottom: 30px;
    }
</style>
