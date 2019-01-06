<template>
    <div class="grid two-columns">
        <div class="card p-2">
            <h3>Snippet tags</h3>
            <div v-for="tag in tags" class="grid p-0 p-b-1">
                <div class="custom-checkbox">
                        <input type="checkbox"
                               name="tag-id"
                               :id="'tag-' + tag.id"
                               :value="tag.id"
                               v-model="checkedTags"
                               required
                               @change="updateTagsValue"
                        >
                    <label :for="'tag-' + tag.id" class="flex">{{ tag.name }}</label>
                </div>
            </div>

            <div class="form-group">
                <label for="referrer">Referrer</label>
                <input type="text" id="referrer" @blur="updateReferrer" v-model="snippetForm.referrer" placeholder="@RealMthrRussia" required>
            </div>

            <div class="form-group">
                <label for="tweet_url">Tweet url</label>
                <input type="text" id="tweet_url" v-model="tweet_url" @change="extractId" placeholder="https://twitter.com/Real_CSS_Tricks/status/874680267625177089" required>
            </div>

            <div class="form-group">
                <label for="tweet_id">Tweet id</label>
                <input type="number" id="tweet_id" v-model="snippetForm.tweet_id" placeholder="48992010" @change="getTweet" required>
            </div>
        </div>
        <div class="card p-2">
            <h2 class="headline-centered">Snippet preview</h2>
            <snippet :prop-snippet="snippet" v-if="snippet"></snippet>
            <button @click="storeSnippet" :disabled="snippet === null" class="button m-t-2">Store the tweet</button>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['propTags', 'propSnippetUrl', 'propReferrer', 'prop-contribution-id'],

        data() {
            return {
                tags: this.propTags,
                snippet: null,
                loading: false,
                tweet_url: this.propSnippetUrl,
                checkedTags: [1],
                snippetForm: {
                    tweet_id: '',
                    referrer: this.propReferrer,
                },
                snippetContent: {
                    user_name: '',
                    user_image: '',
                    image: '',
                    text: '',
                    contributionId: this.propContributionId
                }
            }
        },

        created() {
            // Only run of the snippet url has been set
            if(this.propSnippetUrl) {
                this.extractId();
                this.isContribution = true;
            }
        },

        methods: {
            extractId() {
                const url = this.tweet_url;
                this.snippetForm.tweet_id = url.substring(url.lastIndexOf('/') +1);
                this.getTweet();
            },
            updateTagsValue() {
                this.snippetContent.tags = this.checkedTags;
            },
            updateReferrer() {
                this.snippetContent.referrer = this.snippetForm.referrer;
            },
            getTweet() {
                if(this.snippetForm.tweet_id === '') {
                    this.snippet = null;
                    this.tweet_url = '';
                }
                this.loading = true;

                axios.post('/fetch-tweet', this.snippetForm)
                    .then((response) => {
                        this.snippet = response.data[0];
                        this.loading = false;

                        this.snippetContent = {
                            user_name: response.data[0].user.name,
                            screen_name: response.data[0].user.screen_name,
                            user_image: response.data[0].user.profile_image_url_https,
                            image: (response.data[0].entities.media ? response.data[0].entities.media[0].media_url_https : null),
                            text: response.data[0].full_text,
                            tags: this.checkedTags,
                            contribution_id: this.snippetContent.contributionId
                        };

                        this.snippetContent.tweet_id = this.snippetForm.tweet_id;
                        this.snippetContent.referrer = this.snippetForm.referrer;
                        this.snippetContent.tweet_url = this.tweet_url;

                    }).catch((error) =>{
                    alert(error.response.data);
                });
            },
            storeSnippet() {
                axios.post('/store-snippet', this.snippetContent)
                    .then((response) => {
                        console.log(response);
                        alert(response.data.message);

                        this.snippet = null;
                        this.tweet_url = '';
                        this.snippetForm.tweet_id = '';
                        this.checkedTags = [];
                    }).catch((error) => {
                        Object.keys(error.response.data.errors).forEach(function (key) {
                            let obj = error.response.data.errors[key];
                            obj.forEach((message) => {
                                alert(message);
                            });
                        });
                });
            }
        }
    }
</script>

