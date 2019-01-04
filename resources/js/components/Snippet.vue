<template>
    <div class="card p-1 flex flex-column box-shadow">
        <div class="flex align-center">
            <div class="image-wrapper rounded m-r-1">
                <img :src="snippet.user.profile_image_url_https">
            </div>
            <p><strong>{{ snippet.user.name }}</strong> <a>@{{ snippet.user.screen_name }}</a></p>
        </div>
        <p class="m-l-4 m-b-1" v-html="snippet.full_text"></p>
        <a v-if="snippet.entities.media" class="image-wrapper rounded full-width m-l-4 snippet-img">
            <img v-for="img in snippet.entities.media" :src="img.media_url_https">
        </a>
    </div>
</template>

<script>
    export default {
        props: ['propSnippet'],

        data() {
            return {
                snippet: this.propSnippet
            }
        },

        mounted() {

        }
    }
</script>