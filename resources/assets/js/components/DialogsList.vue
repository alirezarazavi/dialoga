<template>
<div>
    <!--<div class="tabs is-right">-->
        <!--<ul>-->
            <!--<router-link v-bind:to=" '/sort/' + 'popular' " tag="li" active-class="is-active" exact><a>محبوب‌ترین‌ها</a></router-link>-->
            <!--<router-link to="/" tag="li" active-class="is-active" exact><a>آخرین دیالوگ‌ها</a></router-link>-->
        <!--</ul>-->
    <!--</div>-->
    <!--Dialog List-->
    <div v-for="dialog in dialogs.data" class="box dialog-box">
        <article class="media has-text-right">
            <div class="media-left">
            </div>
            <div class="media-content has-text-right">
                <div class="content rtl" style="white-space:pre-line;">
                    <p id="">{{ dialog.text }}</p>
                    <p>{{ dialog.id }}</p>
                </div>

                <nav class="level is-mobile dialog-info">
                    <div class="level-left">
                        <a class="level-item copy" alt="Copy to clipboard" title="متن کپی شد" data-clipboard-action="copy" data-clipboard-target="" data-tippy-title="کپی">
                            <span class="icon is-small has-text-info"><i class="fa fa-clipboard"></i></span>
                        </a>
                        <a class="level-item" v-on:click="onHeartClick(dialog.id)">
                            <span class="icon is-large has-text-primary like-icon">
                                <!--<i v-bind:class="'fa fa-heart-o'">-1</i>-->
                                <i class="fa fa-heart-o animated bounceIn" v-bind:ref="'like_icon_'+dialog.id">{{ dialog.point_count }}</i>
                                <!--<i class="fa fa-heart">+3</i>-->
                            </span>
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
          userPoints: {
            type: Array,
          },
          sortType: {
            required: false,
          }
        },
        data() {
          return {
          }
        },
        mounted() {
          for (let point of this.userPoints) {
            //   console.log(point);
            //   console.log(this.$refs['like_icon_'+point.dialog_id]);
            // Change point icon to full heart (green) on site startup if user pointed it
            if (this.$refs['like_icon_'+point.dialog_id][0] != null) {
                console.log(point.dialog_id + " defined");
            }
            // this.$refs['like_icon_'+point.dialog_id][0].setAttribute('class', 'fa fa-heart animated bounceIn');
          }
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
            onHeartClick(dialogId) {
                // Change icon and increase number of point
                if (this.$refs['like_icon_'+dialogId][0].getAttribute('class') === 'fa fa-heart-o animated bounceIn') {
                    this.$refs['like_icon_'+dialogId][0].setAttribute('class', 'fa fa-heart animated bounceIn');
                    let point = this.$refs['like_icon_'+dialogId][0].innerText;
                    point++;
                    this.$refs['like_icon_'+dialogId][0].innerText = point;
                } else {
                    // Decrease point
                    this.$refs['like_icon_'+dialogId][0].setAttribute('class', 'fa fa-heart-o animated bounceIn');
                    let point = this.$refs['like_icon_'+dialogId][0].innerText;
                    point--;
                    this.$refs['like_icon_'+dialogId][0].innerText = point;
                }
                axios.post('/point/'+dialogId)
                .then((response) => {
                });
            },
        }
    }
</script>
