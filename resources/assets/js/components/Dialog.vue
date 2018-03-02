<template>
<div>
    <div v-for="dialog in dialogs.data" class="box dialog-box">
        <article class="media has-text-right">
            <div class="media-left">
            </div>
            <div class="media-content has-text-right">
                <div class="content rtl" style="white-space:pre-line;">
                    <p id="">{{ dialog.text }}</p>
                </div>

                <nav class="level is-mobile dialog-info">
                    <div class="level-left">
                        <a class="level-item copy" alt="Copy to clipboard" title="متن کپی شد" data-clipboard-action="copy" data-clipboard-target="" data-tippy-title="کپی">
                            <span class="icon is-small has-text-info"><i class="fa fa-clipboard"></i></span>
                        </a>
                        <a class="level-item" v-on:click="onHeartClick()">
                            <span class="icon is-large has-text-primary"><i class="fa fa-heart-o">+2</i></span>
                        </a>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <p class="has-text-grey-light is-size-7 rtl" style="margin-right:10px;">
                                <span>{{ toJalali(dialog.created_at) }}</span> توسط
                                <a v-bind:href="dialog.username" class="user-info">
                                    <span>{{ dialog.username }}</span>
                                    <img v-bind:src="avatarBaseUrl + dialog.avatar" class="profile-image">
                                </a>
                            </p>
                            <span class="tag">
                                <a v-bind:href="getMovieUrl(dialog.imdb_id)">{{ dialog.title }}</a>
                            </span>
                        </div>
                    </div>
                </nav>

            </div>
            <div class="media-right">
                <figure class="image is-96x96 is-square">
                    <img v-bind:src="dialog.poster" style="border-radius:50%;">
                </figure>
            </div>
        </article>
    </div>
</div>
</template>

<script>
	import jalali from 'moment-jalaali';
    export default {
        props: {
          dialogs: {
            type: Object,
            required: true,
          },
          avatarBaseUrl: String,
        },
        data() {
          return {
          }
        },
        mounted() {
        },
        computed: {

        },
        methods: {
        	toJalali(originalDate) {
        		return jalali(originalDate).format('jYYYY/jM/jD');
        	},
            getMovieUrl(imdbId) {
                return '/title/'+imdbId;
            },
            onHeartClick() {
                return alert('hearth click');
            }
        }
    }
</script>